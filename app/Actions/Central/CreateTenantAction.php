<?php

namespace App\Actions\Central;

use App\Http\Requests\Central\Backend\Tenant\StoreTenantRequest;
use App\Models\Central\Tenant\Tenant;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateTenantAction
{
    use AsAction;

    public function handle(array $data, string $domain, bool $createStripeCustomer = true)
    {
        $tenant = Tenant::create($data + [
                'ready' => false,
                'trial_ends_at' => now()->addDays(config('boilerplate.trial_days')),
            ]);

        $tenant->createDomain([
            'domain' => $domain,
        ]);

        if ($createStripeCustomer) {
            $tenant->createAsStripeCustomer();
        }

        return $tenant;
    }

    public function asController(StoreTenantRequest $request)
    {
        $this->handle([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ], $request->domain, true);
        $domain = $request->domain.'.'.env('CENTRAL_DOMAIN');
        return redirect(tenant_route($domain, 'tenant.login'));
    }
}

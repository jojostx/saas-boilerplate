<?php

namespace App\Actions\Central;

use App\Http\Requests\Central\Frontend\TenantLoginRequest;
use App\Models\Central\Domain\Domain;
use Lorisleiva\Actions\Concerns\AsAction;

class TenantLoginAction
{
    use AsAction;

    public function handle(Domain $domain)
    {
        return $domain->tenant;
    }

    public function asController(TenantLoginRequest $request)
    {
        $this->handle(Domain::where('domain', $request->domain)->firstOrFail());
        $domain = $request->domain.'.'.env('CENTRAL_DOMAIN');
        return redirect(tenant_route($domain, 'tenant.login'));
    }
}

<?php


namespace App\Bootstrappers;


use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;

class LivewireBootstrapper implements TenancyBootstrapper
{

    public function bootstrap(Tenant $tenant)
    {
        config([
            'livewire.middleware_group' => [
                'web',
                'universal',
                InitializeTenancyByDomainOrSubdomain::class,
            ]
        ]);
    }

    public function revert()
    {
        config([
            'livewire.middleware_group' => [
                'web',
            ]
        ]);
    }
}

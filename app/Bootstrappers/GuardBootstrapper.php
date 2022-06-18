<?php


namespace App\Bootstrappers;


use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;

class GuardBootstrapper implements TenancyBootstrapper
{

    public function bootstrap(Tenant $tenant)
    {
        config([
           'auth.defaults' => [
               'guard' => 'web',
               'passwords' => 'users',
           ]
        ]);
    }

    public function revert()
    {
        config([
            'auth.defaults' => [
                'guard' => 'admin',
                'passwords' => 'admins',
            ]
        ]);
    }
}

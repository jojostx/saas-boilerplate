<?php


namespace App\Services\Central;


use App\Models\Central\Tenant\Tenant;
use App\Services\BaseService;

class TenantService extends BaseService
{
    /**
     * TenantService constructor.
     * @param Tenant $tenant
     */
    public function __construct(Tenant $tenant)
    {
        $this->model = $tenant;
    }
}

<?php


namespace App\Services\Central;


use App\Models\Central\Auth\Permission;
use App\Services\BaseService;

class PermissionService extends BaseService
{
    /**
     * PermissionService constructor.
     */
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    /**
     * @return mixed
     */
    public function getCategorizedPermissions()
    {
        return $this->model::isMaster()
            ->with('children')
            ->get();
    }

    /**
     * @return mixed
     */
    public function getUncategorizedPermissions()
    {
        return $this->model::singular()
            ->orderBy('sort', 'asc')
            ->get();
    }
}

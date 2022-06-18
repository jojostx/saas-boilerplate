<?php


namespace App\Services\Central;


use App\Models\Central\Auth\Role;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class RoleService extends BaseService
{

    /**
     * RoleService constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function store(array $data = [])
    {
        DB::beginTransaction();
        try {
            $role = $this->model::create(['name' => $data['name']]);
            $role->syncPermissions($data['permissions'] ?? []);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(__('There was a problem creating the role.'));
        }
        DB::commit();
        return $role;
    }

    /**
     * @param Role $role
     * @param array $data
     * @return Role
     * @throws Exception
     */
    public function update(Role $role, array $data = [])
    {
        DB::beginTransaction();
        try {
            $role->update(['name' => $data['name']]);
            $role->syncPermissions($data['permissions'] ?? []);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(__('There was a problem updating the role.'));
        }
        DB::commit();
        return $role;
    }
}

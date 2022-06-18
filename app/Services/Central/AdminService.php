<?php


namespace App\Services\Central;


use App\Exceptions\GeneralException;
use App\Models\Central\Auth\Admin;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class AdminService extends BaseService
{

    /**
     * AdminService constructor.
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    /**
     * @param array $data
     * @return Admin|false
     */
    public function store(array $data = []) : Admin
    {
        DB::beginTransaction();
        try {
            $user = $this->createUser([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'email_verified_at' => isset($data['email_verified']) && $data['email_verified'] === '1' ? now() : null,
            ]);
            $user->assignRole($data['roles']);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        DB::commit();

        return $user;
    }

    public function update(Admin $admin, array $data = [])
    {
        DB::beginTransaction();
        try {
            $admin->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
            $admin->syncRoles($data['roles'] ?? []);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        DB::commit();
        return $admin;
    }

    /**
     * @param array $data
     * @return Admin
     */
    protected function createUser(array $data = []): Admin
    {
        return $this->model::create([
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'password' => $data['password'] ?? null,
            'email_verified_at' => $data['email_verified_at'] ?? null,
        ]);
    }
}

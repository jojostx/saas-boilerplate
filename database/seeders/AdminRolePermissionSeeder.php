<?php

namespace Database\Seeders;

use App\Models\Central\Auth\Admin;
use App\Models\Central\Auth\Permission;
use App\Models\Central\Auth\Role;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminRolePermissionSeeder extends Seeder
{
    use DisableForeignKeys;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $admin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'active' => 1,
        ]);

        $role = Role::create([
            'name' => config('boilerplate.access.role.admin'),
        ]);

        // User Permissions
        $permission = Permission::create([
            'name' => 'user',
            'description' => 'All User Permissions',
        ]);
        $role->givePermissionTo($permission);
        $permission->children()->saveMany([
            new Permission([
                'name' => 'user:list',
                'description' => 'View Users',
            ]),
            new Permission([
                'name' => 'user:deactivate',
                'description' => 'Deactivate Users',
                'sort' => 2,
            ]),
            new Permission([
                'name' => 'user:reactivate',
                'description' => 'Reactivate Users',
                'sort' => 3,
            ]),
            new Permission([
                'name' => 'user:create',
                'description' => 'Create Users',
                'sort' => 4,
            ]),
            new Permission([
                'name' => 'user:read',
                'description' => 'Read Users',
                'sort' => 5,
            ]),
             new Permission([
                 'name' => 'user:update',
                 'description' => 'Update Users',
                 'sort' => 6,
             ]),
            new Permission([
                'name' => 'user:delete',
                'description' => 'Delete Users',
                'sort' => 7,
            ])
        ]);
        foreach ($permission->children()->get() as $child) {
            $role->givePermissionTo($child);
        }

        // Role Permissions
        $permission = Permission::create([
            'name' => 'role',
            'description' => 'All Role Permissions',
        ]);
        $role->givePermissionTo($permission);
        $permission->children()->saveMany([
            new Permission([
                'name' => 'role:list',
                'description' => 'View Roles',
            ]),
            new Permission([
                'name' => 'role:create',
                'description' => 'Create Roles',
                'sort' => 2,
            ]),
            new Permission([
                'name' => 'role:read',
                'description' => 'Read Roles',
                'sort' => 3,
            ]),
            new Permission([
                'name' => 'role:update',
                'description' => 'Update Roles',
                'sort' => 4,
            ]),
            new Permission([
                'name' => 'role:delete',
                'description' => 'Delete Roles',
                'sort' => 5,
            ])
        ]);
        foreach ($permission->children()->get() as $child) {
            $role->givePermissionTo($child);
        }

        // Permissions
        $permission = Permission::create([
            'name' => 'permission',
            'description' => 'All Permissions',
        ]);
        $role->givePermissionTo($permission);
        $permission->children()->saveMany([
            new Permission([
                'name' => 'permission:list',
                'description' => 'View Permissions',
            ]),
            new Permission([
                'name' => 'permission:create',
                'description' => 'Create Permissions',
                'sort' => 2,
            ]),
            new Permission([
                'name' => 'permission:read',
                'description' => 'Read Permissions',
                'sort' => 3,
            ]),
            new Permission([
                'name' => 'permission:update',
                'description' => 'Update Permissions',
                'sort' => 4,
            ]),
            new Permission([
                'name' => 'permission:delete',
                'description' => 'Delete Permissions',
                'sort' => 5,
            ])
        ]);
        foreach ($permission->children()->get() as $child) {
            $role->givePermissionTo($child);
        }

        // Tenant Permissions
        $permission = Permission::create([
            'name' => 'tenant',
            'description' => 'All Tenant Permissions',
        ]);
        $role->givePermissionTo($permission);
        $permission->children()->saveMany([
            new Permission([
                'name' => 'tenant:list',
                'description' => 'View Tenants',
            ]),
            new Permission([
                'name' => 'tenant:create',
                'description' => 'Create Tenants',
                'sort' => 2,
            ]),
            new Permission([
                'name' => 'tenant:read',
                'description' => 'Read Tenants',
                'sort' => 3,
            ]),
            new Permission([
                'name' => 'tenant:update',
                'description' => 'Update Tenants',
                'sort' => 4,
            ]),
            new Permission([
                'name' => 'tenant:delete',
                'description' => 'Delete Tenants',
                'sort' => 5,
            ])
        ]);
        foreach ($permission->children()->get() as $child) {
            $role->givePermissionTo($child);
        }

        $permission = Permission::create([
            'name' => 'stripe',
            'description' => 'View Stripe Dashboard',
        ]);
        $role->givePermissionTo($permission);

        $permission = Permission::create([
            'name' => 'settings',
            'description' => 'Manage App Settings',
        ]);
        $role->givePermissionTo($permission);

        $admin->assignRole($role);
        $this->enableForeignKeys();
    }
}

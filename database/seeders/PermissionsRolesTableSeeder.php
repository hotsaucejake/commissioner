<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super-admin',      // 1
            'admin',            // 2
            'commissioner',     // 3
            'manager',          // 4 - default role for all users
            'decommissioned',   // 5
        ];

        $permissions = [
            'view_admin', // 1
            'view_users', 'add_users', 'edit_users', 'delete_users', // 5
            'view_roles', 'add_roles', 'edit_roles', 'delete_roles', // 9
            'view_permissions', 'add_permissions', 'edit_permissions', 'delete_permissions', // 13
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($roles as $role) {
            $newRole = Role::create(['name' => $role]);
            if ($role === 'super-admin') {
                $newRole->syncPermissions($permissions);
            }
        }
    }
}

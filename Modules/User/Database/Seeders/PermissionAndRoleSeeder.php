<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(["name"=>"user_create"]);
        Permission::create(["name"=>"user_update"]);
        Permission::create(["name"=>"user_access"]);
        Permission::create(["name"=>"user_delete"]);
        Permission::create(["name"=>"user_force_delete"]);

        $role = Role::create(["name"=>"Super Admin","guard_name"=>"web"]);
        $permissions = Permission::all();

        foreach ($permissions as $permission){
            $role->givePermissionTo($permission);
        }
    }
}

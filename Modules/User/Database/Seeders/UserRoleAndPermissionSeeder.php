<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\User\App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /*$this->call(PermissionAndRoleSeeder::class);*/

        $superAdmin = User::factory()->create([
            'name' => 'Alp Emre Elmas',
            'email' => 'elmasalpemre@gmail.com',
        ]);

        $superAdmin->assignRole("Super Admin");
    }
}

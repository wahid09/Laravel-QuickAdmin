<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions = Permission::all();
        Role::updateOrCreate([
            'name' => 'Super Admin',
            'name_bn' => 'সুপার অ্যাডমিন',
            'slug' => 'super-admin',
            'deletable' => false,
            'description' => 'super admin can do everything'
        ])->permissions()->sync($adminPermissions->pluck('id'));

        Role::updateOrCreate([
            'name' => 'User',
            'name_bn' => 'ইউসার',
            'slug' => 'user',
            'deletable' => false,
            'description' => 'User can not do anything'
        ]);
    }
}

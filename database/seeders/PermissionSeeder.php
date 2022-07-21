<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ModuleDashboard = Module::updateOrCreate([
            'name' => 'Admin Dashboard',
            'name_bn' => 'অ্যাডমিন ড্যাশবোর্ড'
        ]);

        Permission::updateOrCreate([
            'module_id' => $ModuleDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'access-dashboard'
        ]);

        $moduleRole = Module::updateOrCreate([
            'name' => 'Role Management',
            'name_bn' => 'রোল ম্যানেজমেন্ট'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Access Role',
            'slug' => 'role-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Create Role',
            'slug' => 'role-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Update Role',
            'slug' => 'role-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Delete Role',
            'slug' => 'role-delete'
        ]);
        // User
        $moduleUser = Module::updateOrCreate([
            'name' => 'User Management',
            'name_bn' => 'ইউসার ম্যানেজমেন্ট'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Access User',
            'slug' => 'user-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Create User',
            'slug' => 'user-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Update User',
            'slug' => 'user-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'Delete User',
            'slug' => 'user-delete'
        ]);
        //Backup
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Backups',
            'name_bn' => 'ব্যাকআপ'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Access Backup',
            'slug' => 'backup-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Create Backup',
            'slug' => 'backup-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Update Backup',
            'slug' => 'backup-download'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Delete Backup',
            'slug' => 'backup-delete'
        ]);

        //Module
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Modules',
            'name_bn' => 'মডিউল'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Access Module',
            'slug' => 'module-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Create Module',
            'slug' => 'module-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Update Module',
            'slug' => 'module-download'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Delete Module',
            'slug' => 'module-delete'
        ]);
    }
}

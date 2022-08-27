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
            'name' => 'Role Index',
            'slug' => 'role-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Role Create',
            'slug' => 'role-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Role Update',
            'slug' => 'role-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Role Delete',
            'slug' => 'role-delete'
        ]);
        // User
        $moduleUser = Module::updateOrCreate([
            'name' => 'User Management',
            'name_bn' => 'ইউসার ম্যানেজমেন্ট'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'User Index',
            'slug' => 'user-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'User Create',
            'slug' => 'user-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'User Update',
            'slug' => 'user-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name' => 'User Delete',
            'slug' => 'user-delete'
        ]);
        //Backup
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Backups',
            'name_bn' => 'ব্যাকআপ'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Backup Index',
            'slug' => 'backup-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Backup Create',
            'slug' => 'backup-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Backup Update',
            'slug' => 'backup-download'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Backup Delete',
            'slug' => 'backup-delete'
        ]);

        //Module
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Modules',
            'name_bn' => 'মডিউল'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Index',
            'slug' => 'module-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Create',
            'slug' => 'module-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Update',
            'slug' => 'module-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Delete',
            'slug' => 'module-delete'
        ]);

        //Permission
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Permissions',
            'name_bn' => 'পার্মিশন্স'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Index',
            'slug' => 'permission-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Create',
            'slug' => 'permission-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Update',
            'slug' => 'permission-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Delete',
            'slug' => 'permission-delete'
        ]);

        //Log
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Logs',
            'name_bn' => 'লগস'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Log Index',
            'slug' => 'log-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Log Delete',
            'slug' => 'log-delete'
        ]);

        //Settings
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Settings',
            'name_bn' => 'সেটিংস'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Setting Index',
            'slug' => 'setting-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Setting Update',
            'slug' => 'setting-update'
        ]);
    }
}

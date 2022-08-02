<?php


namespace App\Repository\Permission;


use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function index()
    {
        return Permission::with('module')->get();
    }

    public function allName()
    {
        return Module::active()->get()->map(function ($module) {
            return [
                'id' => $module->id,
                'name' => $module->name
            ];
        });
    }

    public function show($permission)
    {
        return $permission;
    }

    public function create($data)
    {
        return Permission::create($data);
    }

    public function update($permission, $data)
    {
        return $permission->update($data);
    }

    public function delete($permission)
    {
        return $permission->delete($permission);
    }

    public function permission_automation($module_id, $module_name)
    {
        $prefix = ['index', 'create', 'update', 'delete'];
        for ($i = 0; $i < count($prefix); $i++) {
            $fields = [
                'module_id' => $module_id,
                'name' => str::singular($module_name).' '.$prefix[$i],
                'slug' => str::slug(str::singular($module_name)) . '-' . $prefix[$i]
            ];

            $permissios = Permission::create($fields);
        }

        return $permissios;
    }
}

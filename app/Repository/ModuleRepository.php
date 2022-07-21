<?php


namespace App\Repository;


use App\Models\Module;

class ModuleRepository implements ModuleRepositoryInterface
{
    public function index(){
        return Module::active()->get()->map(function ($module){
            return $module->format();
        });
    }

    public function show($module){
        return [
            'id' => $module->id,
            'name' => $module->name,
            'name_bn' => $module->name_bn,
            'is_active' => $module->is_active == 1 ? 'Active' : "Inactive",
            'created_at' => $module->created_at->diffForHumans(),
            'updated_at' => $module->updated_at->diffForHumans()
        ];
    }

    public function create($data){
        return Module::create($data);
    }
    public function update($module, $data){
        return $module->update($data);
    }
    public function delete($module){
        return $module->delete();
    }

}

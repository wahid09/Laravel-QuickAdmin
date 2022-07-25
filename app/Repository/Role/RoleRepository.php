<?php


namespace App\Repository\Role;


use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function index(){
        return Role::active()->with('permissions')->get();
    }
    public function allName(){}
    public function show($role){}
    public function create($data){
        return Role::create($data);
    }
    public function update($role, $data){
        return $role->update($data);
    }
    public function delete($role){
        return $role->delete($role);
    }
}

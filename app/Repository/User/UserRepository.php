<?php


namespace App\Repository\User;


use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function index(){
        return User::active()->with('role')->get();
    }
    public function show($user){}
    public function create($data){
        return User::create($data);
    }
    public function update($user, $data){
        return $user->update($data);
    }
    public function delete($user){
        return $user->delete($user);
    }
}

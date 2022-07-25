<?php

namespace App\Repository\Role;

interface RoleRepositoryInterface
{
    public function index();

    public function allName();

    public function show($role);

    public function create($data);

    public function update($role, $data);

    public function delete($role);
}

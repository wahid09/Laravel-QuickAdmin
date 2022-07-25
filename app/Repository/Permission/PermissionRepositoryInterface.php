<?php

namespace App\Repository\Permission;

interface PermissionRepositoryInterface
{
    public function index();

    public function allName();

    public function show($permission);

    public function create($data);

    public function update($permission, $data);

    public function delete($permission);
}

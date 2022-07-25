<?php

namespace App\Repository\User;

interface UserRepositoryInterface
{
    public function index();

    public function show($user);

    public function create($data);

    public function update($user, $data);

    public function delete($user);
}

<?php

namespace App\Repository;

interface ModuleRepositoryInterface
{
    public function index();

    public function show($module);

    public function create($data);

    public function update($module, $data);

    public function delete($module);
}

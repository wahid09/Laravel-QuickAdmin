<?php

namespace App\Providers;

use App\Repository\ModuleRepository;
use App\Repository\ModuleRepositoryInterface;
use App\Repository\Permission\PermissionRepository;
use App\Repository\Permission\PermissionRepositoryInterface;
use App\Repository\Role\RoleRepository;
use App\Repository\Role\RoleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ModuleRepositoryInterface::class, ModuleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        //Custom Blade for role

        Blade::if('role', function ($role) {
            return Auth::user()->role->slug == $role;
        });

        Blade::if('permission', function ($permission) {
            return Auth::user()->hasPermission($permission);
        });
    }
}

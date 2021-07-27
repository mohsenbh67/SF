<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;


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
        // Custom balde admin if
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->is('admin');
        });
        // Admins = user or admin
        Blade::if('admins', function () {
            return auth()->check() && (auth()->user()->is('admin') || auth()->user()->is('shop'));
        });
        Blade::if('shop', function () {
            return auth()->check() && auth()->user()->is('shop');
        });
        Blade::if('user', function () {
            return auth()->check() && auth()->user()->is('user');
        });

        // paginator using Bootstrap
        if (str_starts_with(request()->path(), 'landing')) {
            Paginator::useBootstrap();
        }
    }
}

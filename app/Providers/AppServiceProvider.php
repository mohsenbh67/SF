<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


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
    }
}

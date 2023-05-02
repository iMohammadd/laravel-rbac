<?php

namespace Aries\LaravelRbac;

use Illuminate\Support\ServiceProvider;

class LaravelRbacServiceProvider extends ServiceProvider {
    public function register() {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-rbac');
    }

    public function boot() {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-rbac.php'),
            ], 'config');
        }
    }
}
<?php

namespace Aries\LaravelRbac;

use Illuminate\Support\ServiceProvider;

class LaravelRbacServiceProvider extends ServiceProvider {
    public function register() {

    }

    public function boot() {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
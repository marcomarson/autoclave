<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->app['validator']->extend('telefone', function ($attribute, $value)
        {
             return preg_match('/d{4,5}-\d{4}$/', $value) > 0;
        });
    }

    public function register(){}
}

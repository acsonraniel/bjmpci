<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//allows us to add a new custom validator
use Illuminate\Support\Facades\Validator;

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

        //adds 'username' as validator
        Validator::extend('username', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z0-9_-]+$/', $value);
        });
    }
}

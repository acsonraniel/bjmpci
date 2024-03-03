<?php

namespace App\Providers;
use App\Models\AuditLog;
use App\Models\Crime;
use App\Models\User;
use App\Models\Region;
use App\Models\Office;
use App\Models\Code;
use App\Observers\AuthObserver;
use App\Observers\CRUDObserver;


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

        AuditLog::observe(AuthObserver::class);
        Crime::observe(CRUDObserver::class);
        User::observe(CRUDObserver::class);
        Region::observe(CRUDObserver::class);
        Office::observe(CRUDObserver::class);
        Code::observe(CRUDObserver::class);
    }
}

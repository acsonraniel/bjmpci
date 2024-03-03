<?php

namespace App\Providers;

use App\Observers\AuthObserver;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string|string>>
     */
    protected $listen = [
        Login::class => [
            AuthObserver::class . '@login', // Specify the method name explicitly
        ],
        Logout::class => [
            AuthObserver::class . '@logout', // Specify the method name explicitly
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}

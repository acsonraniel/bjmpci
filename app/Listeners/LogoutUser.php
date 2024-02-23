<?php

namespace App\Listeners;

use App\Events\UserInactive;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogoutUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserInactive  $event
     * @return void
     */
    public function handle(UserInactive $event)
    {
        //
        Auth::logout();
    }
}

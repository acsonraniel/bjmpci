<?php

namespace App\Observers;

use App\Models\AuditLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;

class AuthObserver
{
    public function login(Login $event)
    {
        Log::info('User logged in: ' . $event->user->id);
        AuditLog::create([
            'user_id' => $event->user->id,
            'event' => 'login',
        ]);
    }

    public function logout(Logout $event)
    {
        Log::info('User logged out: ' . $event->user->id);
        AuditLog::create([
            'user_id' => $event->user->id,
            'event' => 'logout',
        ]);
    }
}


<?php

namespace App\Observers;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;

class CRUDObserver
{
    public function created(Model $model)
    {
        $this->logEvent($model, 'created');
    }

    public function updated(Model $model)
    {
        $this->logEvent($model, 'updated');
    }

    public function deleted(Model $model)
    {
        $this->logEvent($model, 'deleted');
    }

    private function logEvent(Model $model, string $event)
    {
        AuditLog::create([
            'user_id' => auth()->id(), // Assuming you have authentication and there's a logged-in user
            'event' => $event,
            'model' => get_class($model),
            'old_value' => ($event === 'deleted') ? json_encode($model->getAttributes()) : json_encode($model->getOriginal()),
            'new_value' => ($event === 'created') ? json_encode($model->getAttributes()) : json_encode($model->getChanges()),
            'event_time' => now(),
        ]);
    }
}

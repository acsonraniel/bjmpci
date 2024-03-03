<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class AuditLog extends Model
{
    use HasFactory;
    protected $table = 'tbl_audit_logs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'event',
        'model',
        'old_value',
        'new_value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}



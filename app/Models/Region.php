<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'tbl_region';
    protected $primaryKey = 'id';
    protected $fillable = [
        'region',
        'rank',
        'name',
        'address',
        'landline',
    ];
}

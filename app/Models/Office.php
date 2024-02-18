<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $table = 'tbl_office';
    protected $primaryKey = 'id';
    protected $fillable = [
        'region',
        'office',
        'abbriv',
        'officer'
    ];
}

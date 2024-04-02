<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;
    protected $table = 'tbl_crime';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'group',
        'crime',
        'min_year',
        'min_month',
        'min_day',
        'max_year',
        'max_month',
        'max_day',
        'bailable',
        'ta_disqualified',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $table = 'tbl_code';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category',
        'value',
        'description'
    ];

    // protected $guarded = [];

    // public function regions()
    // {
    //     return $this->hasMany(Region::class);
    // }

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    // public function crimes()
    // {
    //     return $this->hasMany(Crime::class);
    // }
}

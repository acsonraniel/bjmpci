<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'rank',
        'name',
        'region',
        'office',
        'username',
        'password',
        'role',
        'is_user',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_verified_at' => 'datetime',
    ];

        /**
     * Check if the user has the specified role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function rank()
    {
        return $this->belongsTo(Code::class, 'rank', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region', 'id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office', 'id');
    }
}

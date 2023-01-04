<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use App\Models\Traits\HasRole;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Uuids, HasApiTokens, HasFactory, Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'phone',
        'avatar',
        'profession',
        'about',
        'address',
        'ip_addr',
        'social_links',
        'last_login_at',
        'email_verified_at',
        'status',
        'is_online',
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
        'status' => 'boolean',
        'is_online' => 'boolean',
        'social_links' => 'object',
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Add query scope to filter user by role
     * 
     * @param Builder $query
     * @param array $roles
     * @return Builder
     */
    public function scopeOfRole($query, array $roles)
    {
        return $query->whereIn('role', $roles);
    }

    /**
     * Get user full name
     */
    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

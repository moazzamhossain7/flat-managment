<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LotTenant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lot_id',
        'tenant_id',
        'start_date',
        'end_date',
        'agreed_rent',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean', 
    ];

    /**
     * Add query scope to filter user by role
     * 
     * @param Builder $query
     */
    public function scopeOfCurrent($query)
    {
        return $query->whereStatus(false);
    }

    public function lot() {
        return $this->belongsTo(Lot::class);
    }

    public function tenant() {
        return $this->belongsTo(User::class, 'tenant_id');
    }
}

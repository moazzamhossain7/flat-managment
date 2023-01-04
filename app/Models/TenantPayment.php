<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenantPayment extends Model
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
        'payment_date',
        'rent_month',
        'trans_id',
        'amount',
        'payment_method',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 
    ];

    /**
     * Add query scope to filter user by role
     * 
     * @param Builder $query
     * @param string $method
     */
    public function scopeOfPaymentMethod($query, $method)
    {
        return $query->wherePaymentMethod($method);
    }

}

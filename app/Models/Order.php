<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'lot_id', 'name', 'email', 'phone', 'address', 'transaction_id', 'amount', 'currency', 'pay_for', 'is_backend_payment', 'status', 'payload'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'payload' => 'array',
        'is_backend_payment' => 'boolean',
    ];

    /**
     * Order belongs to one player.
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get order by transaction id.
     *
     * @param String $tranId
     * @return mixed
     */
    public static function findOrderByTranId($tranId)
    {
        return self::where('transaction_id', $tranId)
            ->select('id', 'transaction_id', 'status', 'amount', 'user_id', 'is_backend_payment', 'pay_for', 'payload')
            ->firstOrFail();
    }

    /**
     * Update order status.
     *
     * @var array
     */
    public static function updateOrderStatus($tranId, $status)
    {
        if ($order = self::with('user')->where('transaction_id', $tranId)->first()) {
            $oldStatus = $order->status;
            $order->status = $status;
            $order->save();
        }
    }
}

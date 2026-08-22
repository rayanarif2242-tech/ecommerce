<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'subtotal',
        'delivery',
        'total',
        'payment_method',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {

            if (!$order->order_id) {
                $order->order_id = Str::uuid();
            }
        });
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
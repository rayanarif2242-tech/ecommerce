<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [

        'order_id',
        'order_number',

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
        'payment_status',

        'fulfillment_status',
        'delivery_status',
        'delivery_method',

        'status',
    ];


    /**
     * Use UUID for route model binding.
     */
    public function getRouteKeyName()
    {
        return 'order_id';
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {

            // Generate UUID
            if (!$order->order_id) {
                $order->order_id = Str::uuid();
            }

            // Generate Order Number
            if (!$order->order_number) {
                $order->order_number =
                    'ORD-' . strtoupper(Str::random(8));
            }

        });
    }


    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
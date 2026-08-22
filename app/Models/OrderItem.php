<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderItem extends Model
{
    protected $fillable = [
        'order_item_id',
        'order_id',
        'item_type',
        'item_id',
        'name',
        'price',
        'quantity',
        'total',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {

            if (!$item->order_item_id) {
                $item->order_item_id = Str::uuid();
            }
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
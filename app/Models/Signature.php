<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = [
        'signature_id',
        'product_name',
        'description',
        'price',
        'discount_price',
        'stock',
        'image',
        'sort_order',
        'show_on_home',
        'status',
    ];

    protected $casts = [
        'show_on_home' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($signature) {
            if (!$signature->signature_id) {
                $signature->signature_id = 'SIG-' . Str::uuid();
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'signature_id';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Variety extends Model
{
    use HasFactory;

    protected $table = 'varieties';

    protected $fillable = [
        'variety_id',
        'product_id',
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'image',
        'mobile_image',
        'position',
        'featured',
        'status',
        'sort_order',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($variety) {
            if (!$variety->variety_id) {
                $variety->variety_id = (string) Str::uuid();
            }
        });
    }

    /**
     * Use variety_id for route model binding.
     */
    public function getRouteKeyName()
    {
        return 'variety_id';
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'uuid');
    }
}
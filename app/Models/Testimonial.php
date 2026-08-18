<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $primaryKey = 'id';

    protected $fillable = [
        'testimonial_id',
        'product_name',
        'title',
        'active',
        'show_on_home',
        'sort_order',
        'price',
        'discount_price',
        'description',
    ];

    protected $casts = [
        'active' => 'boolean',
        'show_on_home' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($testimonial) {

            if (empty($testimonial->testimonial_id)) {
                $testimonial->testimonial_id = (string) Str::uuid();
            }

        });
    }

    public function getRouteKeyName()
    {
        return 'testimonial_id';
    }
}
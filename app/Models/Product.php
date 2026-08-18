<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'discount_price',
        'stock',
        'featured',
        'home',
        'status',
        'sort',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {

            $product->product_id = (string) Str::uuid();

            // Generate slug when creating
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {

            // Update slug when name changes
            $product->slug = Str::slug($product->name);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'product_id';
    }
}
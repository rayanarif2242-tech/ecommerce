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

        /*
        |--------------------------------------------------------------------------
        | Creating Product
        |--------------------------------------------------------------------------
        */
        static::creating(function ($product) {

            // Generate UUID
            $product->product_id = $product->product_id ?? (string) Str::uuid();

            // Generate unique slug
            $originalSlug = Str::slug($product->name);
            $slug = $originalSlug;
            $counter = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $product->slug = $slug;
        });

        /*
        |--------------------------------------------------------------------------
        | Updating Product
        |--------------------------------------------------------------------------
        */
        static::updating(function ($product) {

            // Only regenerate slug when the product name changes
            if ($product->isDirty('name')) {

                $originalSlug = Str::slug($product->name);
                $slug = $originalSlug;
                $counter = 1;

                // Ignore the current product when checking slug
                while (
                    static::where('slug', $slug)
                        ->where('product_id', '!=', $product->product_id)
                        ->exists()
                ) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                $product->slug = $slug;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Category Relationship
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Route Model Binding
    |--------------------------------------------------------------------------
    */
    public function getRouteKeyName()
    {
        return 'product_id';
    }
}
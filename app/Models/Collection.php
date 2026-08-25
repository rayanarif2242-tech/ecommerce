<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Collection extends Model
{
    use HasFactory;

    /**
     * Primary key.
     */
    protected $primaryKey = 'collection_id';

    /**
     * Primary key is UUID/string, not auto-incrementing integer.
     */
    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * Mass assignable fields.
     */
    protected $fillable = [
        'collection_id',
        'product_id',
        'name',
        'price',
        'slug',
        'description',
        'thumbnail',
        'banner',
        'icon',
        'featured',
        'show_home',
        'status',
        'sort_order',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

    /**
     * Automatically create UUID and slug.
     */
    protected static function boot()
    {
        parent::boot();

        /*
        |--------------------------------------------------------------------------
        | Creating
        |--------------------------------------------------------------------------
        */

        static::creating(function ($collection) {

            // Generate UUID
            if (empty($collection->collection_id)) {
                $collection->collection_id = (string) Str::uuid();
            }

            // Generate unique slug
            $originalSlug = Str::slug($collection->name);

            $slug = $originalSlug;
            $counter = 1;

            while (
                static::where('slug', $slug)->exists()
            ) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $collection->slug = $slug;
        });

        /*
        |--------------------------------------------------------------------------
        | Updating
        |--------------------------------------------------------------------------
        */

        static::updating(function ($collection) {

            // Only regenerate slug if name changed
            if ($collection->isDirty('name')) {

                $originalSlug = Str::slug($collection->name);

                $slug = $originalSlug;
                $counter = 1;

                while (
                    static::where('slug', $slug)
                        ->where(
                            'collection_id',
                            '!=',
                            $collection->collection_id
                        )
                        ->exists()
                ) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                $collection->slug = $slug;
            }
        });
    }

    /**
     * Collection belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'product_id'
        );
    }

    /**
     * Route model binding uses collection_id.
     */
    public function getRouteKeyName()
    {
        return 'collection_id';
    }
}
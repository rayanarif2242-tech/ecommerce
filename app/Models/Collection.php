<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Collection extends Model
{
    use HasFactory;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($collection) {

            $collection->collection_id =
                $collection->collection_id ??
                (string) Str::uuid();

            $originalSlug = Str::slug($collection->name);

            $slug = $originalSlug;
            $counter = 1;

            while (static::where('slug', $slug)->exists()) {

                $slug = $originalSlug . '-' . $counter;

                $counter++;
            }

            $collection->slug = $slug;
        });

        static::updating(function ($collection) {

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

    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'product_id'
        );
    }

    public function getRouteKeyName()
    {
        return 'collection_id';
    }
}
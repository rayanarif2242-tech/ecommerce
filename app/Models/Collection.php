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
        'name',
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

        /*
        |--------------------------------------------------------------------------
        | Creating Collection
        |--------------------------------------------------------------------------
        */
        static::creating(function ($collection) {

            // Generate UUID
            $collection->collection_id = $collection->collection_id
                ?? (string) Str::uuid();

            // Generate unique slug
            $originalSlug = Str::slug($collection->name);

            $slug = $originalSlug;
            $counter = 1;

            while (static::where('slug', $slug)->exists()) {

                $slug = $originalSlug . '-' . $counter;

                $counter++;
            }

            $collection->slug = $slug;
        });

        /*
        |--------------------------------------------------------------------------
        | Updating Collection
        |--------------------------------------------------------------------------
        */
        static::updating(function ($collection) {

            // Only change slug if the name was changed
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

    public function getRouteKeyName()
    {
        return 'collection_id';
    }
}
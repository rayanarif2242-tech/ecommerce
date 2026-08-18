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

        'seo_description'

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($collection) {

            $collection->collection_id = Str::uuid();

            $collection->slug = Str::slug($collection->name);

        });

        static::updating(function ($collection) {

            $collection->slug = Str::slug($collection->name);

        });

    }

    public function getRouteKeyName()
    {
        return 'collection_id';
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = [

        'blog_id',
        'title',
        'slug',
        'image',
        'category',
        'author',
        'short_description',
        'content',
        'meta_title',
        'meta_description',
        'featured',
        'show_on_home',
        'status',
        'sort_order',

    ];


    protected $casts = [

        'featured' => 'boolean',
        'show_on_home' => 'boolean',
        'status' => 'boolean',

    ];


    protected static function boot()
    {
        parent::boot();


        static::creating(function ($blog) {

            if(empty($blog->blog_id)) {

                $blog->blog_id = (string) Str::uuid();

            }

        });

    }


    // Use UUID instead of ID in URLs
    public function getRouteKeyName()
    {
        return 'blog_id';
    }

}
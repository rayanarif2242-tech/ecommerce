<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [

        'subcategory_id',

        'category_id',

        'name',

        'slug',

        'description',

        'price',

        'discount_price',

        'image',

        'banner',

        'icon',

        'featured',

        'show_on_home',

        'status',

        'sort_order',

        'meta_title',

        'meta_description',

    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',

        'featured' => 'boolean',
        'show_on_home' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Sub Category belongs to Category
     */
   public function category()
{
    return $this->belongsTo(Category::class, 'category_id', 'id');
}

    /**
     * Use subcategory_id instead of id in URLs
     */
    public function getRouteKeyName()
    {
        return 'subcategory_id';
    }
}
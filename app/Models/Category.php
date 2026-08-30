<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
        'featured',
        'show_on_home',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    // Parent Category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Child Categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Sub Categories
    public function subCategories()
    {
        return $this->hasMany(
            SubCategory::class,
            'category_id',
            'id'
        );
    }

    public function getRouteKeyName()
    {
        return 'category_id';
    }
}
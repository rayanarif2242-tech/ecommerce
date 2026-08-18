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

    'image',

    'banner',

    'icon',

    'featured',

    'show_on_home',

    'status',

    'sort_order',

    'meta_title',

    'meta_description'

];

public function category()
{
    return $this->belongsTo(Category::class);
}
public function getRouteKeyName()
{
    return 'subcategory_id';
}
}


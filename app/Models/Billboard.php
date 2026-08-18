<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Billboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'billboard_id',
        'name',
        'title',
        'subtitle',
        'description',
        'image',
        'button_text',
        'button_link',
        'featured',
        'show_home',
        'status',
        'sort_order',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($billboard) {
            $billboard->billboard_id = Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'billboard_id';
    }
}
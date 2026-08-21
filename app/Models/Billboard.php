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
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'image',
        'mobile_image',
        'position',
        'featured',
        'status',
        'sort_order',
        'start_date',
        'end_date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($billboard) {
            if (!$billboard->billboard_id) {
                $billboard->billboard_id = Str::uuid();
            }
        });
    }
}
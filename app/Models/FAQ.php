<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FAQ extends Model
{
protected $table = 'faqs';
    protected $fillable = [

        'uuid',
        'question',
        'answer',
        'status',
        'order'

    ];


    protected static function boot()
    {
        parent::boot();


        static::creating(function($faq){

            $faq->uuid = Str::uuid();

        });

    }


    public function getRouteKeyName()
    {
        return 'uuid';
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class ContactMessage extends Model
{

    use HasFactory;


    protected $fillable = [

        'message_id',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status'

    ];


    protected static function boot()
    {

        parent::boot();


        static::creating(function($message){

            $message->message_id = (string) Str::uuid();

        });

    }


    public function getRouteKeyName()
    {
        return 'message_id';
    }

}
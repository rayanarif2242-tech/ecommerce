<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $table = 'newsletter_subscribers';

    protected $fillable = [
        'subscriber_id',
        'email',
        'status',
        'subscribed_at',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscriber) {

            if (!$subscriber->subscriber_id) {
                $subscriber->subscriber_id = (string) Str::uuid();
            }

            if (!$subscriber->subscribed_at) {
                $subscriber->subscribed_at = now();
            }

        });
    }

    public function getRouteKeyName()
    {
        return 'subscriber_id';
    }
}

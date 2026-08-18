<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    protected $fillable = [
        'variety_id',
        'name',
        'description',
        'status',
    ];
    public function getRouteKeyName()
{
    return 'variety_id';
}
}
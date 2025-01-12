<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'plate',
        'merk',
        'model',
        'price',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;

    protected $fillable = [
        'license',
        'name',
        'phone',
        'password',
        'address'
    ];

    protected $hidden = [
        'license',
        'password',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}

<?php

namespace App;

use App\Robot;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function robots()
    {
        return $this->hasMany(Robot::class);
    }

    public function getRobots()
    {
        return $this->robots()->get();
    }

    public static function getValidationRules()
    {
        return [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}

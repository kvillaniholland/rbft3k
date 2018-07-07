<?php

namespace App;

use App\Fight;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    protected $fillable = [
        'name', 'weight', 'power', 'speed', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wins()
    {
        return $this->hasMany(Fight::class, 'winner');
    }

    public function losses()
    {
        return $this->hasMany(Fight::class, 'loser');
    }

    public function getUser()
    {
        return $this->user()->first();
    }

    public static function getValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'weight' => 'required|integer|max:10|min:0',
            'power' => 'required|integer|max:10|min:0',
            'speed' => 'required|integer|max:10|min:0',
        ];
    }
}

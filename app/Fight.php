<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    protected $fillable = [
        'winner', 'loser', 'attacker', 'defender'
    ];

    public function winner()
    {
        return $this->belongsTo(Robot::class, 'winner');
    }

    public function loser()
    {
        return $this->belongsTo(Robot::class, 'loser');
    }

    public function attacker()
    {
        return $this->belongsTo(Robot::class, 'attacker');
    }

    public function defender()
    {
        return $this->belongsTo(Robot::class, 'defender');
    }

    public function getWinner()
    {
        return $this->winner()->first();
    }

    public function getLoser()
    {
        return $this->loser()->first();
    }
}

<?php

namespace App\Helpers;

use App\Fight;
use App\Robot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Statistics
{
    public static function getTopRobots($count = 10)
    {
        return Robot::withCount('wins')
            ->withCount('losses')
            ->orderBy('wins_count', 'desc')
            ->take($count)
            ->get();
    }

    public static function getRecentFights($count = 5)
    {
        return Fight::orderBy('created_at', 'desc')
            ->take($count)
            ->get();
    }

    public static function dailyAttackCount(Robot $robot)
    {
        return Fight::whereHas('attacker', function ($query) use ($robot) {
            $query->where('id', '=', $robot->id);
        })
            ->where('created_at', '>=', today())
            ->count();
    }

    public static function dailyDefendCount(Robot $robot)
    {
        return Fight::whereHas('defender', function ($query) use ($robot) {
            $query->where('id', '=', $robot->id);
        })
            ->where('created_at', '>=', today())
            ->count();
    }
}

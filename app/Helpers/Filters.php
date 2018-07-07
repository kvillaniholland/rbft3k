<?php

namespace App\Helpers;

use App\Helpers\Statistics;
use App\Robot;

class Filters
{
    private $statistics;

    public function __construct(Statistics $statistics)
    {
        $this->statistics = $statistics;
    }

    public function robotCanAttack(Robot $robot)
    {
        return $this->statistics->dailyAttackCount($robot) < config('app.max_daily_attacks');
    }

    public function robotCanDefend(Robot $robot)
    {
        return $this->statistics->dailyDefendCount($robot) < config('app.max_daily_defends');
    }
}

<?php

namespace App\Rules;

use App\Helpers\Statistics;
use App\Robot;
use Illuminate\Contracts\Validation\Rule;

class DailyAttacksLessThan implements Rule
{
    private $max;

    public function __construct(int $max)
    {
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        $robot = Robot::find($value);
        return Statistics::dailyAttackCount($robot) < $this->max;
    }

    public function message()
    {
        return 'This robot cannot attack again today.';
    }
}

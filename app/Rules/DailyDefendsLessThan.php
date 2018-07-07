<?php

namespace App\Rules;

use App\Helpers\Statistics;
use App\Robot;
use Illuminate\Contracts\Validation\Rule;

class DailyDefendsLessThan implements Rule
{
    private $max;

    public function __construct(int $max)
    {
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        $robot = Robot::find($value);
        return Statistics::dailyDefendCount($robot) < $this->max;
    }

    public function message()
    {
        return 'This robot cannot be attacked again today.';
    }
}

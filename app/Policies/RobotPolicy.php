<?php

namespace App\Policies;

use App\User;
use App\Robot;
use Illuminate\Auth\Access\HandlesAuthorization;

class RobotPolicy
{
    use HandlesAuthorization;

    public function manageRobot(User $user, Robot $robot)
    {
        return $user->id === $robot->user_id;
    }
}

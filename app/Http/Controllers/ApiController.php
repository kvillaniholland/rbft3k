<?php

namespace App\Http\Controllers;

use App\Fight;
use App\Helpers\Statistics;

class ApiController extends Controller
{
    private $statistics;

    public function __construct(Statistics $statistics)
    {
        $this->statistics = $statistics;
    }

    public function getRecentFights()
    {
        $recentFights = $this->statistics->getRecentFights();

        $recentFights->each(function (Fight $fight) {
            $fight->load('attacker', 'defender');
        });

        return response()->json([
            'recent_fights' => $recentFights,
        ]);
    }

    public function getTopRobots()
    {
        return response()->json([
            'top_robots' => $this->statistics->getTopRobots(),
        ]);
    }
}

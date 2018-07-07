<?php

namespace App\Http\Controllers;

use App\Helpers\Statistics;
use App\Robot;

class HomeController extends Controller
{
    private $statistics;

    public function __construct(Statistics $statistics)
    {
        $this->statistics = $statistics;
    }

    public function index()
    {
        return view('home', [
            'recent_fights' => $this->statistics->getRecentFights(),
            'top_robots' => $this->statistics->getTopRobots()
        ]);
    }
}

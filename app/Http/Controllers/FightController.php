<?php

namespace App\Http\Controllers;

use App\Fight;
use App\Helpers\Filters;
use App\Robot;
use App\Rules\DailyAttacksLessThan;
use App\Rules\DailyDefendsLessThan;
use Illuminate\Http\Request;

class FightController extends Controller
{
    private $request;
    private $filters;

    public function __construct(Request $request, Filters $filters)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->filters = $filters;
    }

    public function showFight(Fight $fight)
    {
        return view('fights.showFight', [
            'winner' => $fight->getWinner()->name,
            'loser' => $fight->getLoser()->name,
            'winning_user' => $fight->getWinner()->getUser()->username,
            'losing_user' => $fight->getLoser()->getUser()->username,
        ]);
    }

    public function createFightForm()
    {
        $user = $this->request->user();

        $userRobots = $user->getRobots()->filter([$this->filters, 'robotCanAttack']);
        $opponentRobots = Robot::all()
            ->where('user_id', '!=', $user->id)
            ->filter([$this->filters, 'robotCanDefend']);

        return view('fights.createFight', [
            'userRobots' => $userRobots,
            'opponentRobots' => $opponentRobots
        ]);
    }

    public function createFight()
    {
        $this->request->validate([
            'attacker_id' => [
                'required',
                'integer',
                'exists:robots,id',
                new DailyAttacksLessThan(config('app.max_daily_attacks'))
            ],
            'defender_id' => [
                'required',
                'integer',
                'exists:robots,id',
                'different:attacker_id',
                new DailyDefendsLessThan(config('app.max_daily_defends'))
            ]
        ]);

        $attacker = Robot::find($this->request->get('attacker_id'));
        $defender = Robot::find($this->request->get('defender_id'));

        $this->authorize('manageRobot', $attacker);

        $attackerScore = $attacker->power + $attacker->speed - $attacker->weight + rand(1, 10);
        $defenderScore = $defender->weight + $defender->speed - $defender->power + rand(1, 10);

        $winner = $attackerScore >= $defenderScore ? $attacker : $defender;
        $loser = $winner === $attacker ? $defender : $attacker;

        $fight = Fight::create([
            'attacker' => $attacker->id,
            'defender' => $defender->id,
            'winner' => $winner->id,
            'loser' => $loser->id
        ]);
        return redirect()->route('showFight', ['fight' => $fight]);
    }
}

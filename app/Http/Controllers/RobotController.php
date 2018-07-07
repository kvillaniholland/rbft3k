<?php

namespace App\Http\Controllers;

use App\Robot;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Statement;
use Validator;

class RobotController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

    public function createRobotForm()
    {
        return view('robots.createRobot');
    }

    public function updateRobotForm(Robot $robot)
    {
        $this->authorize('manageRobot', $robot);
        return view('robots.editRobot', ['robot' => $robot]);
    }

    public function createRobot()
    {
        $this->request->validate(Robot::getValidationRules());
        $this->request->user()->robots()->create($this->request->all());
        return redirect()->route('listRobots');
    }

    public function updateRobot(Robot $robot)
    {
        $this->authorize('manageRobot', $robot);
        $this->request->validate(Robot::getValidationRules());
        $robot->fill($this->request->all());
        $robot->save();
        return redirect()->route('listRobots');
    }

    public function listRobots(Request $request)
    {
        return view('robots.listRobots', [
            'robots' => $request->user()->getRobots()
        ]);
    }

    public function deleteRobot(Robot $robot)
    {
        $this->authorize('manageRobot', $robot);
        $robot->delete();
        return redirect()->route('listRobots');
    }

    public function importRobotsForm()
    {
        return view('robots.importRobots');
    }

    public function importRobots()
    {
        $this->request->validate([
            'robots' => 'required|mimetypes:text/plain,text/csv'
        ]);

        $csv = Reader::createFromPath($this->request->file('robots')->getRealPath(), 'r');
        $csv->setHeaderOffset(0);
        $records = (new Statement())->process($csv);

        foreach ($records as $record) {
            $validator = Validator::make($record, Robot::getValidationRules());

            if ($validator->fails()) {
                return redirect()->route('importRobotsForm')
                    ->withErrors($validator);
            }

            $this->request->user()->robots()->create($record);
        }

        return redirect()->route('listRobots');
    }
}

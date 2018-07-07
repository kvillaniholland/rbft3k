<?php

use App\Robot;
use App\Fight;
use Illuminate\Http\Request;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::prefix('robots')->group(function () {
    Route::get('new', 'RobotController@createRobotForm')->name('createRobotForm');
    Route::get('import', 'RobotController@importRobotsForm')->name('importRobotsForm');
    Route::get('{robot}/edit', 'RobotController@updateRobotForm')->name('updateRobotForm');
    Route::get('/', 'RobotController@listRobots')->name('listRobots');

    Route::post('import', 'RobotController@importRobots')->name('importRobots');
    Route::post('/', 'RobotController@createRobot')->name('createRobot');
    Route::post('{robot}', 'RobotController@updateRobot')->name('updateRobot');
    Route::post('{robot}/delete', 'RobotController@deleteRobot')->name('deleteRobot');
});

Route::prefix('fights')->group(function () {
    Route::get('new', 'FightController@createFightForm')->name('createFightForm');
    Route::get('{fight}', 'FightController@showFight')->name('showFight');

    Route::post('/', 'FightController@createFight')->name('createFight');
});

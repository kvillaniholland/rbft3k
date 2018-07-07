<?php

Route::get('/fights/recent', 'ApiController@getRecentFights')->name('apiRecentFights');
Route::get('/robots/top', 'ApiController@getTopRobots')->name('apiTopRobots');

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
  $meeting = Events::where('calendar_id', '=', 1)
                   ->where("end_date", ">", strftime("%F %T", time()))
                   ->where('active', '=', 1)
                   ->take(1)
                   ->get(array("start_date"))
                   ->toArray();

  // $next_meeting = strftime("%B %d at %l %p", next_meeting_unix_timestamp)
  // -> Weekday, Month Day at Hour AM/PM
  return View::make('index')->with('next_meeting', strftime("%A, %B %d at %l %p", strtotime($meeting[0]['start_date'])));
});

Route::get('/members', 'MembersController@index');

Route::get('/calendar', 'CalendarsController@index');

Route::get('/by-laws', function() { return View::make('by-laws'); });

Route::get('/documents', 'DocumentsController@index');

Route::get('/facebook', function() {
  return Redirect::to('https://www.facebook.com/pages/Indiana-Real-Estate-Exchangors/220020221382445', 303);
});


/**
 * Handling application errors.
 */

// 404
App::missing(function($exception)
{
    // Log::error('404 - ' . $exception)
    return View::make('errors.four_oh_four');
});
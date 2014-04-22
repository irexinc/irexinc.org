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

Route::get('/', 'NewsController@index');

Route::get('/members', 'MembersController@index');

Route::get('/calendar', 'CalendarsController@index');
Route::get('/calendar/download', 'CalendarsController@download');

Route::get('/speakers', 'SpeakersController@index');

Route::get('/by-laws', 'StaticController@by_laws');

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

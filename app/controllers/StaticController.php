<?php

class StaticController extends BaseController {

  /**
  * GET -> http://irexinc.org/
  *
  * @return View
  */
  public function index ()
  {
    $meeting = Events::where('calendar_id', '=', 1)
      ->where("end_date", ">", strftime("%F %T", time()))
      ->where('active', '=', 1)
      ->take(1)
      ->get(array("start_date"))
      ->toArray();

    // $next_meeting = strftime("%B %e at %l %p", next_meeting_unix_timestamp)
    // -> Weekday, Month Day at Hour AM/PM
    return View::make('index')->with('next_meeting', strftime("%A, %B %e at %l %p", strtotime($meeting[0]['start_date'])));
  }

  /**
  * GET -> http://irexinc.org/by-laws
  *
  * @return view
  */
  public function by_laws ()
  {
    return View::make('by-laws');
  }

}
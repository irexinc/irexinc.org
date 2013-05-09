<?php

class StaticController extends BaseController {

  /**
  * GET -> http://irexinc.org/
  *
  * @return View
  */
  public function index ()
  {
    $next_meeting = Events::getNextMeeting();

    return View::make('index')->with(compact('next_meeting'));
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
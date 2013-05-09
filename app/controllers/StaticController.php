<?php

class StaticController extends BaseController {

  /**
  * The events implementation.
  *
  * @var Static
  */
  protected $events;

  /**
  * Set our Events instance.
  *
  * @param Events $events
  * @return void
  */
  public function __construct(Events $events)
  {
    $this->events = $events;
  }

  /**
  * GET -> http://irexinc.org/
  *
  * @return View
  */
  public function index ()
  {
    $next_meeting = $this->events->getNextMeeting();

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
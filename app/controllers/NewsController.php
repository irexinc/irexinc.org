<?php

class NewsController extends BaseController {

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
  * GET -> irexinc.org/ & irexinc.org/news/
  *
  * @return View
  */
  public function index ()
  {
    $next_meeting = $this->events->getNextMeeting();

    return View::make('news.index')->with(compact('next_meeting'));
    // return var_dump($next_meeting);
  }

}
<?php

class SpeakersController extends BaseController {

  /**
  * The instances of our variables for local usage in this model to stop global variable referencing.
  *
  * @var Static
  */
  protected $events;
  protected $speakers;

  /**
  * Set our events instance.
  *
  * @param Events $events
  * @ return void
  */
  public function __construct(Events $events, Speakers $speakers)
  {
    $this->events = $events;
    $this->speakers = $speakers;
  }

  /**
  * GET -> irexinc.org/speakers/
  *
  * @return View
  */
  public function index ()
  {
    $speakers = $this->speakers->getAllSpeakers();

    return View::make('speakers.index')->with('speakers', Paginator::make($speakers, count($speakers), 10));
  }
}

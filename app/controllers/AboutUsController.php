<?php

class AboutUsController extends BaseController {

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
  * GET -> http://irexinc.org/by-laws
  *
  * @return view
  */
  public function by_laws ()
  {
    return View::make('static.by-laws');
  }

}

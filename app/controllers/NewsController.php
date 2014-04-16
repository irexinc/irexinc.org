<?php

class NewsController extends BaseController {

  /**
  * The model implementations.
  *
  * @var Static
  */
  protected $events;
  protected $speakers;

  /**
  * Set our model instances on construction.
  *
  * @param Events $events
  * @param Speakers $speakers
  * @return void
  */
  public function __construct(Events $events, Speakers $speakers)
  {
    $this->events = $events;
    $this->speakers = $speakers;
  }

  /**
  * GET -> irexinc.org/ & irexinc.org/news/
  *
  * @return View
  */
  public function index ()
  {
    $meetings = $this->events->getNextMeetings();

    foreach ($meetings as $index => $meeting)
    {
      $meetings[$index]['speaker'] = $this->speakers->getSpeakerView($meeting['date']);
      $meetings[$index]['date'] = strftime("%B %d", strtotime($meeting['date']));
    }

    return View::make('news.index')->with(compact('meetings'));
  }

}

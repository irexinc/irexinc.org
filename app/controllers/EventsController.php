<?php

class EventsController extends BaseController {

  public function index()
  {
    $events = Events::orderBy('start_date')->orderBy('end_date')->get();

    return View::make('events.index')->with('events', $events);
  }

}
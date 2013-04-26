<?php

class CalendarsController extends BaseController {

  public function index()
  {
    $events = Events::with('calendar')->orderBy('start_date')->orderBy('end_date')->get();

    return View::make('calendar.index')->with('events', $events);
  }

}
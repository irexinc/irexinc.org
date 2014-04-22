<?php

class CalendarsController extends BaseController {

  public function index()
  {
    $events = Events::with('calendar')->where('active', '=', 1)->orderBy('start_date')->orderBy('end_date')->get();

    return View::make('calendar.index')->with('events', $events);
  }

  public function download()
  {
    // Our ics built calendar download.
    $return = "";

    /*
    * calendar_id 1 = IREX Meetings
    * calendar_id 2 = Other Meetings
    */
    $events = Events::with('calendar')->where('calendar_id', '=', 1)->where('active', '=', 1)->orderBy('start_date')->orderBy('end_date')->get(array('start_date', 'end_date', 'title', 'location', 'address'));

    // Calendar header information.
    $return .= "BEGIN:VCALENDAR\r\n";
    $return .= "VERSION:2.0\r\n";
    $return .= "PRODID:-//Indiana Real Estate Exchangors//NONSGML irexinc.org//EN\r\n";
    $return .= "X-WR-CALNAME:IREX Meetings\r\n";
    $return .= "X-PUBLISHED-TTL:PT1H\r\n";
    $return .= "METHOD:REQUEST\r\n\r\n"; // requied by Outlook

    foreach ($events as $event)
    {
      $start_timestamp = strtotime($event->start_date);
      $end_timestamp = strtotime($event->end_date);
      $title = $event->title;
      $location = $event->location . ", " . $event->address;

      $return .= "BEGIN:VEVENT\r\n";
      $return .= "UID:" . date('Ymd') . 'T' . date('His') . "-" . rand() . "-irexinc.org\r\n"; // required by Outlok
      $return .= "DTSTAMP:" . date('Ymd', $start_timestamp) . 'T' . date('His', $start_timestamp) . "\r\n"; // required by Outlook
      $return .= "DTSTART:" . date('Ymd', $end_timestamp) . 'T' . date('His', $end_timestamp) . "\r\n";
      $return .= "SUMMARY:" . $title . "\r\n";
      $return .= "DESCRIPTION:" . $title . "\r\n";
      $return .= "LOCATION:" . $location . "\r\n";

      // Set a calendar reminder to notify them a day before about the upcoming meeting.
      $return .= "BEGIN:VALARM\r\n";
      $return .= "TRIGGER:-P1D\r\n";
      $return .= "ACTION:DISPLAY\r\n";
      $return .= "DESCRIPTION: " . $title . "\r\n";
      $return .= "END:VALARM\r\n";

      $return .= "END:VEVENT\r\n\r\n";
    }

    // Close the calendar data.
    $return .= "END:VCALENDAR\r\n";


    // Return our file for download.
    $response = Response::make($return, '200');
    $response->header('Content-Type', 'text/Calendar');
    $response->header('Content-Disposition', 'inline; filename="irex-calendar.ics"');
    return $response;

  }

}

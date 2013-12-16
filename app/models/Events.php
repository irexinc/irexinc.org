<?php

class Events extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'events';

  /**
  * Checks to see if the event is out of state.
  *
  * @return boolean
  */
  public function isIREX()
  {
    if ($this->calendar_id == 1)
    {
      return true;
    }

    return false;
  }

  /**
  * Get the events date in the proper format for displaying on the calendar page.
  *
  * @return string
  */
  public function getDate()
  {
    $start = strtotime($this->start_date);
    $end = strtotime($this->end_date);

    $current_year = date('Y');

    // The event either only has a start date or it is all in the same month.
    // So we will only seed the date for this case.
    if (substr($this->start_date, 0, 4) == $current_year) {

      // We are in the same year as the event.
      $date = strftime("%B %-e", $start);

    } else {

      // The event occurs outside the current year.
      $date = strftime("%B %-e, %Y", $start);

    }

    // If we have an end date, lets figure out how to provide the correct date.
    if ($end != false) {

      if (substr($this->end_date, 0, 4) == substr($this->start_date, 0, 4)) {

        if (substr($this->end_date, 5, 2) == substr($this->start_date, 5, 2)) {

          if (substr($this->end_date, 8, 2) == substr($this->start_date, 8, 2)) {

            // The event is a single day event; because of this, we can just use
            // the seeded date from our start date.
            null;

          } else {

            // The event is multi day but in the same month.
            $date .= " &dash; " . strftime("%-e", $end);

          }

        } else {

          // The event spans over the end of the month.
          $date .= " &dash; " . strftime("%B %-e", $end);

        }

      } else {

        // The event spans over the end of the year.
        $date = strftime("%B %-e, %Y", $start) . " &dash; " . strftime("%B %-e, %Y", $end);

      }

    }

    return $date;
  }

  /**
  * Gets the next IREX meeting from the events table.
  *
  * @return string
  */
  public function getNextMeeting()
  {
    $meeting = Events::where('calendar_id', '=', 1)
      ->where("end_date", ">", strftime("%F %T", time()))
      ->where('active', '=', 1)
      ->take(1)
      ->get()
      ->toArray();

    $next_meeting = "";

    if ( !empty($meeting) )
    {

      // We only have a single response, WTF Laravel for not just giving me that single array anymore.
      $meeting = $meeting[0];


      // The start of our returned $next_meeting_title string.
      $next_meeting_title = "The ";

      // Lets reset the title to what we want displayed on the website.
      if ( $meeting['title'] == "IREX Meeting" )
      {

        $next_meeting_title .= "next meeting";

      }
      else
      {

        $title = substr($meeting['title'], 12);

        $offset = 0;

        while ( ! preg_match('/[A-Za-z]/', $title[$offset]) )
        {
          $offset++;
        }

        $next_meeting_title .= substr($title, $offset);

      }

      $next_meeting_title .= " is on ";

      /**
      **  Translates DATETIME to Long Date and Time format.
      **
      **  strftime("%B %e at %l %p", $next_meeting_title_unix_timestamp)
      **  -> Weekday, Month Day at Hour AM/PM
      **  return strftime("%A, %B %e at %l %p", strtotime($meeting[0]['start_date']));
      **/
      if ($meeting['start_date'] == date('Y')) {

        // The next meeting is in this year.
        $next_meeting_title .= strftime("%A, %B %e at %l %p", strtotime($meeting['start_date']));

      } else {

        // The next meeting is next year.
        $next_meeting_title .= strftime("%A, %B %e, %Y at %l %p", strtotime($meeting['start_date']));

      }

      $next_meeting_title .= ".";


      // Reorder our return variable.
      $next_meeting = array(
        "title" => $next_meeting_title,
        "address" => $meeting['address'],
        "location" => $meeting['location']
      );
    }

    // Return our data.
    return $next_meeting;
  }

  /**
  * Gets the calendar id the event belongs too.
  *
  * @return int
  */
  public function calendar()
  {
    return $this->belongsTo('Calendars');
  }

}
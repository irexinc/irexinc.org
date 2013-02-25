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
  public function getOutOfState()
  {
    if (strstr(strtolower($this->title), "irex") != false) {
      return "";
    }

    if (!is_null($this->address)) {
      $address = strtolower($this->address);

      if (strstr($address, ", in") != false or strstr($address, ",in") != false) {
        return "";
      }
    }

    return " class=\"out-of-state\"";
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

    // The event either only has a start date or it is all in the same month.
    // So we will only seed the date for this case.
    $date = strftime("%B %-e", $start);

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
}
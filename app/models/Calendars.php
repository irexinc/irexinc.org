<?php

class Calendars extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'calendars';

  /**
  * Returns all the events that below to this calendar.
  *
  * @return array
  */
  public function events() {
    return $this->hasMany('Events');
  }

}
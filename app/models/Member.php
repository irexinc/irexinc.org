<?php

class Member extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'members';

  /**
  * Return an array of all regular members.
  *
  * @var object
  */
  public function getRegularMembers()
  {
    return $this->where('active', '=', true)->where('board', '=', false)->orderBy('last_name')->get();
  }

  /**
  * Return an array of all board members.
  *
  * @var object
  */
  public function getBoardMembers()
  {
    return $this->where('active', '=', true)->where('board', '=', true)->orderBy('last_name')->get();
  }

  /**
  * Is the member active?
  *
  * @return boolean
  */
  public function isActive()
  {
    return (boolean)$this->active;
  }

  /**
  * Is the member on the board?
  *
  * @return boolean
  */
  public function isBoardMember()
  {
    return (boolean)$this->board;
  }

  /**
  * The member's first and last name.
  *
  * @var string
  */
  public function getName() {
    if ($this->suffix != NULL) {
      return trim($this->first_name . " " . $this->last_name . ", " . $this->suffix);
    }

    return trim($this->first_name . " " . $this->last_name);
  }

  /**
  * Returns the phone number in the proper ###-###-#### format.
  *
  * @return string
  */
  public function getPhone()
  {
    if (is_null($this->office_phone)) {
      return "";
    }

    if (preg_match('^[0-9]{3}+-[0-9]{3}+-[0-9]{4}^', $this->office_phone)) {
      return $this->office_phone;
    }
    else {
      $items = array('/\ /', '/\+/', '/\-/', '/\./', '/\,/', '/\(/', '/\)/', '/[a-zA-Z]/');
      $clean = preg_replace($items, '', $this->office_phone);
      return substr($clean, 0, 3) . "-" . substr($clean, 3, 3) . "-" . substr($clean, 6, 4);
    }
  }

  /**
  * Return the whole "City, State Zip" string properly formatted.
  *
  * @return string
  */
  public function getCityStateZip()
  {
    if (is_null($this->city) and is_null($this->zip)) {
      return "";
    }

    return $this->city . ", " . $this->state . " " . substr($this->zip, 0, 5);
  }
}
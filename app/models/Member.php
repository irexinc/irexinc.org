<?php

class Member extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'members';


  /**
  *
  * member.role_id as follows:
  *
  * 1 = Board
  * 2 = Regular
  * 3 = Affiliate
  * 4 = Associate
  * 5 = Student
  *
  */

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
  * The member's first and last name.
  *
  * @return string
  */
  public function getFullName() {
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

  /**
  * Create the member to member_role relation.
  *
  *
  */
  public function roles()
  {
    $this->belongsTo('MemberRoles', 'id', 'role_id');
  }
}

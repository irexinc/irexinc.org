<?php

class MemberRoles extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'member_roles';

  public function getRole()
  {
    return $this->role;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescription()
  {
    return $this->description;
  }

  /**
  * Returns all the members that match the role.
  *
  * @return array
  */
  public function members() {
    return $this->hasMany('Member', 'role_id', 'id');
  }

}

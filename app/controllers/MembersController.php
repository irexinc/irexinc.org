<?php
/**
* Verb      Path                  Action
* GET       /members              index
* GET       /members/create       create
* POST      /members              store
* GET       /members/{id}         show
* GET       /members/{id}/edit    edit
* PUT/PATCH /members/{id}         update
* DELETE    /members/{id}         destroy
*/
class MembersController extends BaseController {

  /**
  * The database table implementation.
  *
  * @var Members
  */
  protected $member_roles;

  /**
  * Set our Member instance.
  *
  * @param Member $member
  * @return void
  */
  public function __construct(MemberRoles $member_roles)
  {
    $this->member_roles = $member_roles;
  }

  /**
  * GET -> /members
  *
  * @return View
  */
  public function index ()
  {
    $roles = $this->member_roles->with(array('members' => function($query)
    {

      $query->orderBy('last_name')->orderBy('first_name');

    }))
    ->where('id', '<>', 6)->get();

    return View::make('members.index')->with('roles', $roles);
  }

}

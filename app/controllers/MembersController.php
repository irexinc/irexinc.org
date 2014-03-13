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
  * The members implementation.
  *
  * @var Members
  */
  protected $members;

  /**
  * Set our Member instance.
  *
  * @param Member $member
  * @return void
  */
  public function __construct(Member $members)
  {
    $this->members = $members;
  }

  /**
  * GET -> /members
  *
  * @return View
  */
  public function index ()
  {
    $members = array(
      "board"   => $this->members->getBoardMembers(),
      "regular" => $this->members->getRegularMembers(),
    );

    return View::make('members.index')->with('members', $members);
  }

}
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
  * GET -> /members
  *
  * @return View
  */
  public function index ()
  {
    $members = array(
      'board' => Member::where('active', '=', true)->where('board', '=', true)->orderBy('last_name')->get(),
      'regular' => Member::where('active', '=', true)->where('board', '=', false)->orderBy('last_name')->get(),
    );

    return View::make('members.index')->with('members', $members);
  }

}
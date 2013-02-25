<?php

class MembersController extends BaseController {

  public function index()
  {
    $members = array(
      'board' => Member::where('active', '=', true)->where('board', '=', true)->orderBy('last_name')->get(),
      'regular' => Member::where('active', '=', true)->where('board', '=', false)->orderBy('last_name')->get(),
    );

    return View::make('members.index')->with('members', $members);
  }

}
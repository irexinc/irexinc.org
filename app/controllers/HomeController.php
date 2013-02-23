<?php

class HomeController extends BaseController {

  protected $layout = 'layout';

  public function index()
  {
    $this->layout->content = View::make('index');
  }

}
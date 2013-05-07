<?php

class BaseController extends Controller {

  /**
   * Setup the layout used by the controller.
   *
   * @return void
   */
  protected function setupLayout()
  {
    if ( ! is_null($this->layout))
    {
      $this->layout = View::make($this->layout);
    }
  }


  /**
   * Create the page title.
   *
   * @return string
   */
  public static function title($title = null)
  {
    $base_title = "Indiana Real Estate Exchangors, Inc.";

    return (isset($title) && $title == "") ? $base_title : $title . $base_title;
  }
}
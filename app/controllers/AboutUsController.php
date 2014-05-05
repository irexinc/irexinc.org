<?php

class AboutUsController extends BaseController {

  /**
  * GET -> http://irexinc.org/by-laws
  *
  * @return view
  */
  public function by_laws ()
  {
    return View::make('about.by-laws');
  }

  /**
  * GET -> http://irexinc.org/contact
  *
  * @return view
  */
  public function getContact ()
  {
    return View::make('about.contact');
  }
}

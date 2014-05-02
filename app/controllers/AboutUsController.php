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

}

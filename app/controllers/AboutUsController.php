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

  /**
  * POST -> http://irexinc.org/contact
  *
  * @return reroute to /
  */
  public function postContact ()
  {
    $data = Input::all();

    // Add the current time for displaying in the email.
    $data['time'] = date('F, l j, Y') . " at " . date('h:i:s A');

    Mail::queue(array('text' => 'emails.contact'), array('request' => $data), function($message) use ($data)
    {
      $message->to($_ENV['CONTACT_REQUEST_EMAIL'])
        ->from($data['email'], $data['name'])
        ->subject('[irexinc.org] Contact Request from ' . $data['name'] . ' :: ' . $data['subject']);
    });

    return "true";

  }
}

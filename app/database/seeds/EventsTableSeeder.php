<?php

class EventsTableSeeder extends Seeder {

  public function run()
  {
    // IREX Meetings/Events
    $events = array(
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-01-10 09:00:00', 'end_date' => '2013-01-10 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-01-24 09:00:00', 'end_date' => '2013-01-24 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-02-14 09:00:00', 'end_date' => '2013-02-14 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-02-28 09:00:00', 'end_date' => '2013-02-28 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-03-14 09:00:00', 'end_date' => '2013-03-14 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-03-28 09:00:00', 'end_date' => '2013-03-28 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-04-11 09:00:00', 'end_date' => '2013-04-11 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-04-25 09:00:00', 'end_date' => '2013-04-25 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-05-09 09:00:00', 'end_date' => '2013-05-09 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-05-23 09:00:00', 'end_date' => '2013-05-23 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-06-13 09:00:00', 'end_date' => '2013-06-13 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-06-27 09:00:00', 'end_date' => '2013-06-27 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Knights of Columbus', 'address' => '1305 North Delaware Street, Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-07-11 09:00:00', 'end_date' => '2013-07-11 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-07-25 09:00:00', 'end_date' => '2013-07-25 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-08-08 09:00:00', 'end_date' => '2013-08-08 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-08-22 09:00:00', 'end_date' => '2013-08-22 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-09-12 09:00:00', 'end_date' => '2013-09-12 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-09-26 08:00:00', 'end_date' => '2013-09-27 19:00:00', 'title' => 'IREX Fall Marketing Session', 'location' => 'Hilton Garden Inn - Greenwood', 'address' => '5255 Noggle Way, Indianapolis, IN 46237' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-10-10 09:00:00', 'end_date' => '2013-10-10 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-10-24 09:00:00', 'end_date' => '2013-10-24 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-11-14 09:00:00', 'end_date' => '2013-11-14 12:00:00', 'title' => 'IREX Meeting', 'location' => 'Indianapolis, IN' ),
      array( 'calendar_id' => 1, 'active' => 1, 'start_date' => '2013-12-12 09:00:00', 'end_date' => '2013-12-12 12:00:00', 'title' => 'IREX Meeting - Holiday Party and Awards Luncheon', 'location' => 'Indianapolis, IN' ),

      // Non-IREX Events
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-01-20 00:00:00', 'end_date' => '2013-01-23 00:00:00', 'title' => 'Society of Exchange Counselors', 'url' => 'http://www.secounselors.com', 'location' => 'Arizona' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-03-17 00:00:00', 'end_date' => '2013-03-20 00:00:00', 'title' => 'Society of Exchange Counselors', 'url' => 'http://www.secounselors.com', 'location' => 'Kansas' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-04-28 00:00:00', 'end_date' => '2013-05-01 00:00:00', 'title' => 'KREE Derby City Marketing Session', 'url' => 'http://kree.org', 'location' => 'Louisville, KY' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-05-19 00:00:00', 'end_date' => '2013-05-22 00:00:00', 'title' => 'Society of Exchange Counselors', 'url' => 'http://www.secounselors.com', 'location' => 'North Carolina' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-05-19 00:00:00', 'end_date' => '2013-05-22 00:00:00', 'title' => 'RECon (ICSC)', 'url' => 'http://reconlasvegas.icsc.org/2013RECON/', 'location' => 'Las Vegas, NV' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-06-13 00:00:00', 'end_date' => '2013-06-14 00:00:00', 'title' => 'Indiana Commercial Board Annual Conference', 'url' => 'http://www.myicbr.org/education-events/annual-conference/', 'location' => 'JW Marriott', 'address' => '10 South West Street Indianapolis, IN 46204' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-07-21 00:00:00', 'end_date' => '2013-07-26 00:00:00', 'title' => 'Society of Exchange Counselors', 'url' => 'http://www.secounselors.com', 'location' => 'Ohio' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-08-12 00:00:00', 'end_date' => '2013-08-13 00:00:00', 'title' => 'OCREA Marketing Session & Education', 'url' => 'http://www.ocrea.org', 'location' => 'Columbus, OH' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-09-15 00:00:00', 'end_date' => '2013-09-18 00:00:00', 'title' => 'Society of Exchange Counselors', 'url' => 'http://www.secounselors.com', 'location' => 'Rhode Island' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-10-02 00:00:00', 'end_date' => '2013-10-03 00:00:00', 'title' => 'Chicago Deal Making (ICSC)', 'url' => 'http://www.icsc.org/events-and-programs/details/chicago-deal-making/', 'location' => 'Chicago, IL' ),
      array( 'calendar_id' => 2, 'active' => 1, 'start_date' => '2013-11-17 00:00:00', 'end_date' => '2013-11-20 00:00:00', 'title' => 'Society of Exchange Counselors', 'url' => 'http://www.secounselors.com', 'location' => 'California' ),
    );

    foreach ($events as $event)
    {
      Events::create($event);
    }
  }
}
<?php

class CalendarsTableSeeder extends Seeder {

  public function run()
  {
    $calendars = array(
      array( 'active' => 1, 'title' => 'IREX Meetings'  ),
      array( 'active' => 1, 'title' => 'Other Meetings' ),
    );

    DB::table('calendars')->insert($calendars);
  }
}
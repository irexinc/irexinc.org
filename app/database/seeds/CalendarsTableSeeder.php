<?php

class CalendarsTableSeeder extends Seeder {

  public function run()
  {
    $calendars = [
      [ 'active' => 1, 'title' => 'IREX Meetings'  ],
      [ 'active' => 1, 'title' => 'Other Meetings' ],
    ];

    DB::table('calendars')->insert($calendars);
  }
}
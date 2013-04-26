<?php

class CalendarsTableSeeder extends Seeder {

  public function run()
  {
    $rows = array (
      array('active' => 1, 'title' => 'IREX Meetings'),
      array('active' => 1, 'title' => 'Other Meetings'),
    );

    foreach ($rows as $row) {
      Calendars::create($row);
    }
  }
}
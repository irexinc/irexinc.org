<?php

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();

    $this->call('MembersTableSeeder');
    $this->call('EventsTableSeeder');
    $this->call('CalendarsTableSeeder');
    $this->call('MemberRolesTableSeeder');
  }
}

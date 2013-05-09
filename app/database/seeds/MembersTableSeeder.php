<?php

class MembersTableSeeder extends Seeder {

  public function run()
  {
    $members = array(
      array( 'active' => 0, 'board' => 0, 'first_name' => 'A', 'last_name' => 'Z', 'company' => 'Company A', 'address' => '12345 A Street', 'city' => 'Indianapolis', 'state' => 'IN', 'zip' => '12345', 'office_phone' => '000-000-0000', 'cell_phone' => '000-000-0000', 'email' => 'spam@spam.com' ),
      array( 'active' => 1, 'board' => 0, 'first_name' => 'B', 'last_name' => 'Y', 'company' => 'Company B', 'address' => '12345 B Street', 'city' => 'Indianapolis', 'state' => 'IN', 'zip' => '12345', 'office_phone' => '111-111-1111', 'cell_phone' => '111-111-1111', 'email' => 'spam@spam.com' ),
      array( 'active' => 1, 'board' => 1, 'first_name' => 'C', 'last_name' => 'X', 'company' => 'Company C', 'address' => '12345 C Street', 'city' => 'Indianapolis', 'state' => 'IN', 'zip' => '12345', 'office_phone' => '222-222-2222', 'cell_phone' => '222-222-2222', 'email' => 'spam@spam.com' ),
      array( 'active' => 0, 'board' => 1, 'first_name' => 'D', 'last_name' => 'W', 'company' => 'Company D', 'address' => '12345 D Street', 'city' => 'Indianapolis', 'state' => 'IN', 'zip' => '12345', 'office_phone' => '333-333-3333', 'cell_phone' => '333-333-3333', 'email' => 'spam@spam.com' ),
    );

    DB::table('members')->insert($members);
  }
}
<?php

class MemberRolesTableSeeder extends Seeder {

  public function run()
  {
    $member_roles = array(
      array( 'name' => 'Board Members' ),
      array( 'name' => 'Regular Members' ),
      array( 'name' => 'Affiliate Members' ),
      array( 'name' => 'Associate Members' ),
      array( 'name' => 'Student Members' ),
      array( 'name' => 'Inactive Members' ),
    );

    DB::table('member_roles')->insert($member_roles);
  }
}

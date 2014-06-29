<?php

class MemberRolesTableSeeder extends Seeder {

  public function run()
  {
    $member_roles = array(
      array( 'name' => 'Board Member' ),
      array( 'name' => 'Regular Member' ),
      array( 'name' => 'Affiliate Member' ),
      array( 'name' => 'Associate Member' ),
      array( 'name' => 'Student Member' ),
    );

    DB::table('member_roles')->insert($member_roles);
  }
}

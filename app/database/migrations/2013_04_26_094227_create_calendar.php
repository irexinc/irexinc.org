<?php

use Illuminate\Database\Migrations\Migration;

class CreateCalendar extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('calendars', function($table)
    {
      $table->increments('id');
      $table->string('title');
      $table->boolean('active')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('calendars');
  }

}
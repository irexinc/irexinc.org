<?php

use Illuminate\Database\Migrations\Migration;

class UpdateEventsWithCalendars extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('events', function($table)
    {
      $table->integer('calendar_id')->after('id');

      // We do not use the description column, so lets drop it.
      $table->dropColumn('description');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('events', function($table)
    {
      $table->dropColumn('calendar_id');

      $table->text('description')->nullable();
    });
  }

}
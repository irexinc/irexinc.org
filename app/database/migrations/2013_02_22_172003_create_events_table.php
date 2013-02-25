<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('events', function($table)
    {
      $table->increments('id');

      $table->boolean('active')->default(false);

      $table->datetime('start_date');
      $table->datetime('end_date')->nullable();

      $table->string('title');
      $table->text('location');
      $table->text('description')->nullable();
      $table->text('address')->nullable();

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
    Schema::drop('events');
  }

}
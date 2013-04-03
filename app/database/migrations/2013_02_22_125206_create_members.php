<?php

use Illuminate\Database\Migrations\Migration;

class CreateMembers extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('members', function($table)
    {
      $table->increments('id');
      // $table->primary('id');

      $table->boolean('active')->default(false);
      $table->boolean('board')->default(false);

      $table->string('first_name', 50)->default(null);
      $table->string('last_name', 50)->default(null);

      $table->text('company')->nullable();

      $table->string('city', 50)->nullable();
      $table->text('address')->nullable();
      $table->string('state', 2)->default('IN')->nullable();
      $table->string('zip', 10)->nullable();

      $table->string('office_phone', 20)->nullable();
      $table->string('cell_phone', 20)->nullable();
      $table->text('email')->nullable();

      $table->string('title', 100)->nullable();

      // Allows us to be able to track when members are created and updated.
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
    Schema::drop('members');
  }
}
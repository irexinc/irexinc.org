<?php

use Illuminate\Database\Migrations\Migration;

class UpdateEventsWithUrl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function($table)
    {
	    $table->string('url')->after('title')->nullable();
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
			$table->dropColumn('url');
		});
	}

}
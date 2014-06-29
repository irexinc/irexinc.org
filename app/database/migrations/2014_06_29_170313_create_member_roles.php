<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description')->nullable()->default(null);
			$table->timestamps();
		});

		Schema::table('members', function($table)
		{
			$table->integer('role_id')->after('board')->unsigned();
			$table->foreign('role_id')->references('id')->on('member_roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('members', function($table)
		{
			$table->dropForeign('members_role_id_foreign');
			$table->dropColumn('role_id');
		});

		Schema::drop('member_roles');
	}

}

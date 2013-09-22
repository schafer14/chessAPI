<?php

use Illuminate\Database\Migrations\Migration;

class CreateTournamentPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournament_permission', function($table)
		{
		    $table->integer('user_id');
		    $table->integer('tournament_id');
		    $table->integer('permission_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournament_permission');
	}

}
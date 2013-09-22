<?php

use Illuminate\Database\Migrations\Migration;

class CreateTournamentUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournament_user', function($table)
		{
		    $table->integer('tournament_id');
		    $table->integer('user_id');
		    $table->integer('score');
		    $table->integer('tie_breaker');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournament_user');
	}

}
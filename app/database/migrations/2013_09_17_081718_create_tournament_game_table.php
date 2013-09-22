<?php

use Illuminate\Database\Migrations\Migration;

class CreateTournamentGameTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournament_game', function($table)
		{
		    $table->integer('tournament_id');
		    $table->integer('game_id');
		    $table->integer('round_num');
		    $table->timestamp('starts_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournament_game');
	}

}
<?php

use Illuminate\Database\Migrations\Migration;

class CreateTournamentRoundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournament_round', function($table)
		{
		    $table->integer('tournament_id');
		    $table->integer('round_num');
		    $table->integer('tense');
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
		Schema::drop('tournament_round');
	}

}
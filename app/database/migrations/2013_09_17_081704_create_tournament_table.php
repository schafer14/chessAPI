<?php

use Illuminate\Database\Migrations\Migration;

class CreateTournamentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournament', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->integer('num_rounds');
		    $table->integer('time_rule_id');
		    $table->string('type');
		    $table->timestamp('start_time');
		    $table->integer('is_live');
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
		Schema::drop('tournament');
	}

}
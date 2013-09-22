<?php

use Illuminate\Database\Migrations\Migration;

class CreateGameUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_user', function($table)
		{
		    $table->integer('user_id');
		    $table->integer('game_id');
		    $table->integer('result');
		    $table->integer('is_white');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('game_user');
	}

}
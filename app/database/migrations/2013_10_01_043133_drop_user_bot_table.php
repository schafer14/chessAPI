<?php

use Illuminate\Database\Migrations\Migration;

class DropUserBotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('user_bot');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('user_bot', function($table) {
			$table->increments('id');
		});

	}

}
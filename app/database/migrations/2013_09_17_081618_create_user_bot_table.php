<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserBotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_bot', function($table)
		{
		    $table->integer('user_id');
		    $table->integer('dev_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_bot');
	}

}
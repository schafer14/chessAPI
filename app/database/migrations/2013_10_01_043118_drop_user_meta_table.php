<?php

use Illuminate\Database\Migrations\Migration;

class DropUserMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('user_meta');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('user_meta', function($table) {
			$table->increments('id');
		});
	}

}
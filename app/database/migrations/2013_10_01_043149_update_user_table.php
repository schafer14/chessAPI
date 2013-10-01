<?php

use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user', function($table) {
			$table->string('email');
			$table->string('password');
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
		Schema::table('user', function($table) {
			$table->dropColumn('email', 'password', 'dev_id');
		});
	}

}
<?php

use Illuminate\Database\Migrations\Migration;

class CreateTimeRuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('time_rule', function($table)
		{
		    $table->increments('id');
		    $table->integer('flat');
		    $table->integer('gain');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('time_rule');
	}

}
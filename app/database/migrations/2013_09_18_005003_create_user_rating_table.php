<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rating', function($table)
		{
		    $table->integer('user_id');
		    $table->integer('bullet')->default(1200);
		    $table->integer('blitz')->default(1200);
		    $table->integer('slow')->default(1200);
		    $table->integer('level');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rating');
	}

}
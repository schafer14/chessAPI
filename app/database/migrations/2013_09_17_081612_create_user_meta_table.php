<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_meta', function($table)
		{
		    $table->integer('user_id');
		    $table->string('email');
		    $table->string('password');
		    $table->integer('age')->nullable();
		    $table->integer('country_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_meta');
	}

}
<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_permission', function($table)
		{
		    $table->integer('user_id');
		    $table->integer('permission_id');
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
		Schema::drop('user_permission');
	}

}
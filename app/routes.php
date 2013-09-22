<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


// GET			/resource				index		resource.index
// GET			/resource/create		create		resource.create
// POST			/resource				store		resource.store
// GET			/resource/{id}			show		resource.show
// GET			/resource/{id}/edit		edit		resource.edit
// PUT/PATCH	/resource/{id}			update		resource.update
// DELETE		/resource/{id}			destroy		resource.destroy

Route::resource('user', 'UserController');
Route::resource('game', 'GameController');
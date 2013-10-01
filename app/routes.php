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

Route::group(array('after' => 'after'), function()
{
	Route::resource('user', 'UserController');
	Route::resource('game', 'GameController');
	Route::resource('auth', 'AuthController');
	Route::get('logout', function() {
		Auth::logout();
		return 'Logout';
	});

	Route::options('user', function() {});
	Route::options('game', function() {});
	Route::options('auth', function() {});
});

 Route::filter('after', function($route, $request, $response)
{
	$headers = Request::header('Origin');
	if ($headers) {

		$origin = $headers;

		$allowed_origins = array(
			'http://purplechess.dev',
			'http://purplechess.com'		
		);

		if (in_array($origin, $allowed_origins)) {

			$response->header('Access-Control-Allow-Origin', $origin);
			$response->header('Access-Control-Allow-Methods', '*');
		    $response->header('Access-Control-Allow-Headers', '*, x-requested-with, Content-Type');
		    $response->header('Access-Control-Allow-Credentials', 'true');


		}
	}

});
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

Route::get('test', function() {
	$rating = User::with('rating')->find(Auth::user()->id)->toArray()['rating'];
	dd($rating);
});


// GET			/resource				index		resource.index
// GET			/resource/create		create		resource.create
// POST			/resource				store		resource.store
// GET			/resource/{id}			show		resource.show
// GET			/resource/{id}/edit		edit		resource.edit
// PUT/PATCH	/resource/{id}			update		resource.update
// DELETE		/resource/{id}			destroy		resource.destroy


Route::get('/', function() {
	return View::make('api');
});

Route::group(array('after' => 'after'), function()
{
	Route::post('pusher/prop', 'PusherController@prop');
	Route::post('pusher', 'PusherController@presence');
	Route::resource('user', 'UserController');
	Route::resource('game', 'GameController');
	Route::resource('auth', 'AuthController');
	
	Route::get('logout', function() {
		Auth::logout();
		return 'Logout';
	});

	Route::options('pusher', function() {});
	Route::options('pusher/prop', function() {});
	Route::options('logout', function() {});
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
			'http://www.purplechess.dev',
			'http://www.purplechess.com'		
		);

		if (in_array($origin, $allowed_origins)) {

			$response->header('Access-Control-Allow-Origin', $origin);
			$response->header('Access-Control-Allow-Methods', '*');
		    $response->header('Access-Control-Allow-Headers', '*, x-requested-with, Content-Type, Access-Control-Expose-Headers');
		    $response->header('Access-Control-Allow-Credentials', 'true');
		    $response->header('Access-Control-Expose-Headers', 'Set-Cookie');


		}
	}

});
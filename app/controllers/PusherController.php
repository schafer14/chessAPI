<?php

class PusherController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function presence()
	{
		$pusher = new Pusher('82495e54704164d896ff', '9db69936a451cc95747d', '55591');

		if (Auth::check()) {
			$rating = User::with('rating')->find(Auth::user()->id)->toArray()['rating'];

			$data = array(
				'name'=> Auth::user()->name,
				'type'=> Auth::user()->type,
				'rating'=> $rating
			);
			$id = Auth::user()->id;
			
			echo $pusher->presence_auth($_POST['channel_name'], $_POST['socket_id'], $id, $data);
		} else {
			return Response::make('Forbidden.', 403);
		}

	}

}
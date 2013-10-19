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

	public function prop() 
	{
		$input = Input::JSON();

		
		$pusher = new Pusher('82495e54704164d896ff', '9db69936a451cc95747d', '55591');
		$response = $pusher->trigger('private-' . $input->get('opp'), 'prop', array( 
			'opp' => Auth::user()->name,
			'time' => $input->get('time'),
			'opp_id' => Auth::user()->id
		));

		return 's';
	}

	public function accept() {
		$input = Input::JSON();

		$time = $input->get('time');
		if ($time == 'bullet') {
			$time_id = 1;
			$flat_time = 3;
			$gain_time = 0;
		} else if ($time == 'blitz') {
			$time_id = 2;
			$flat_time = 5;
			$gain_time = 2;
		} else {
			$time_id = 3;
			$flat_time = 20;
			$gain_time = 0;
		}

		$white = rand(0, 1);

		$game = new Game();
		$game->time_rule_id = $time_id;
		$game->save();

		$player1 = new GameUser();
		$player1->user_id = Auth::user()->id;
		$player1->game_id = $game->id;
		$player1->is_white = $white;
		$player1->save();

		$player2 = new GameUser();
		$player2->user_id = $input->get('opp');
		$player2->game_id = $game->id;
		$player2->is_white = !$white;
		$player2->save();

		$pusher = new Pusher('82495e54704164d896ff', '9db69936a451cc95747d', '55591');
		$response = $pusher->trigger('private-' . $input->get('opp'), 'game', array( 
			'id'=>$game->id,
		));

		return $game->toArray();
	}

	public function game_auth($game_id) {
		$pusher = new Pusher('82495e54704164d896ff', '9db69936a451cc95747d', '55591');

		if (GameUser::where('game_id', '=', $game_id)->where('user_id', '=', Auth::user()->id)->get()->toArray()) {
		 	echo $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
		} else {
			return Response::make('Forbidden.', 403);
		}
	}

}
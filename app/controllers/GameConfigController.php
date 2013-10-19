<?php

class GameConfigController extends BaseController {

	public function index($game_id) 
	{
		return array(
			'my_name' => Auth::user()->name,
			'my_id' => Auth::user()->id,
			'white' => GameUser::where('game_id', '=', $game_id)->where('user_id', '=', Auth::user()->id)->first()->toArray()['is_white']
		);
		
	}

}
<?php

class GameController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Game::with('players')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::make('501. Not implemented.', 501);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::JSON();

		$game = new Game();
		$game->time_rule_id = $input->get('time_rule_id');
		$game->save();

		$p1 = new GameUser();
		$p1->game_id = $game->id;
		$p1->user_id = $input->get('player_1_id');
		$p1->is_white = 1;
		$p1->save();

		$p2 = new GameUser();
		$p2->game_id = $game->id;
		$p2->user_id = $input->get('player_2_id');
		$p2->is_white = 0;
		$p2->save();

		return $this->show($game->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Game::with('players')->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return Response::make('501. Not implemented.', 501);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
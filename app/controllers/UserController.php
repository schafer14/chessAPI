<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::with('meta', 'rating', 'dev', 'dev.user')->get();

		return $users;
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

		$user = new User();
		$user->name = $input->get('name');
		
		if($input->get('type')) {
			$user->type = $input->get('type');
		}
		$user->save();

		$rating = new UserRating();
		$rating->user_id = $user->id;
		$rating->level = 1;
		$rating->save();

		if($user->type === 'user') {
			$meta = new UserMeta();
			$meta->user_id = $user->id;
			$meta->email = $input->get('email');
			$meta->password = Hash::make(Config::get('auth.salt') . $input->get('password'));
			if($input->get('age')) {
				$meta->age = $input->get('age');
			}
			$meta->save();
		} 

		if($user->type === 'bot') {
			$dev = new UserDev();
			$dev->user_id = $user->id;
			$dev->dev_id = $input->get('dev_id');
			$dev->save();
		} 

		return $this->show($user->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::with('meta', 'rating', 'dev', 'dev.user')->find($id);

		return $user;
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
		$u = User::find($id);
		$um = UserMeta::find($id);
		$ud = UserDev::find($id);
		$ur = UserRating::find($id);

		$u->delete();
		$um->delete();
		$ud->delete();
		$ur->delete();
		
		return $this->index();
	}

}
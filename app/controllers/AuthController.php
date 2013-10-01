<?php

class AuthController extends BaseController {

	public function index()
	{
		if (Auth::check()) {
			return Auth::user();
		} else {
			return 'false';
		}
	}

	public function store()
	{
		$input = Input::JSON();

		if (Auth::check()) {
			return 'Please Logout first';
		}

		if($input->get('type')) {
			return Response::make('Login for types other then user under development.', 501);
		} else {
			$u = array(
				'email' => $input->get('email'), 
				'password'=>$input->get('password')
			);
			if (Auth::attempt($u)) {
				return Auth::user();
			} else {
				return 'false';
			}
		}
	}

	public function show() {
		return Response::make('Unimplemented.', 501);
	}

}
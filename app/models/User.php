<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	public function meta()
	{
		return $this->hasOne('UserMeta');
	}

	public function rating()
	{
		return $this->hasOne('UserRating');
	}

	public function dev()
	{
		return $this->hasMany('UserDev');
	}

}
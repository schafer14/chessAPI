<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserMeta extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_meta';
	protected $hidden = array('password');
	public $primaryKey = 'user_id';
	public $timestamps = false;
	

}
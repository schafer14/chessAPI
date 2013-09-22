<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserDev extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_bot';
	public $primaryKey = 'user_id';
	public $timestamps = false;
	
	public function user()
	{
		return $this->belongsTo('User', 'dev_id');
	}
}
<?php namespace Shinefind\Services;

use Shinefind\Entities\User;
use Laravel\Validator;

class User_Validator
{
	public static $RULES = array(
		'email'=>'email|max:40|required',
		'password'=>'min:8|max:256|required',
		'id'=>'integer',
		'first_name'=>'alpha|required|max:30',
		'last_name'=>'alpha|required|max:30',
		'zip'=>'required|size:5', //this needs to be looked at. integer rule can't be used because technically these are strings
		'admin'=>'integer|between:0,1',
		'newsletter'=>'integer|between:0,1',
		'state'=>'required|alpha|size:2',
		'city'=>'required|alpha'
	);

	public static function validate(User $user)
	{
		$validator = Validator::make(get_object_vars($user), self::$RULES);

		return !$validator->fails();
	}
}


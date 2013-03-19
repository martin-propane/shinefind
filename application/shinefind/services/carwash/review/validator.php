<?php namespace Shinefind\Services;

use Shinefind\Entities\Carwash_Review;
use Laravel\Validator;

class Carwash_Review_Validator
{
	public static $RULES = array(
		'title'=>'max:256',
		'review'=>'max:20000',
		'cw_id'=>'integer|required',
		'rating'=>'integer|required'
	);

	public static function validate(Carwash_Review $cw_review)
	{
		$validator = Validator::make(get_object_vars($cw_review), self::$RULES);

		return !$validator->fails();
	}
}




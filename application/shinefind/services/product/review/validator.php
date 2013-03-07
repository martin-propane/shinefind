<?php namespace Shinefind\Services;

use Shinefind\Entities\Product_Review;
use Laravel\Validator;

class Product_Review_Validator
{
	public static $RULES = array(
		'title'=>'max:40',
		'review'=>'max:3000',
		'p_id'=>'integer|required',
		'rating'=>'integer|required'
	);

	public static function validate(Product_Review $p_review)
	{
		$validator = Validator::make(get_object_vars($p_review), self::$RULES);

		return !$validator->fails();
	}
}




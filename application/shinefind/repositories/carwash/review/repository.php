<?php namespace Shinefind\Repositories;

use \stdClass;
use Laravel\Database;
use Shinefind\Entities\Carwash;

class Carwash_Review_Repository
{
	public $TABLE = 'Data_Reviews_Carwashes';
	public function add($data)
	{
		assert(array_key_exists('cw_id', $data));
		assert(array_key_exists('rating', $data));
		assert(array_key_exists('review', $data));

		$cw_id = $data['cw_id'];
		$rating = $data['rating'];
		$review = $data['review'];

		Database::table($this->TABLE)->insert(array(
			'cw_id'=>$cw_id,
			'rating'=>$rating,
			'review'=>$review));
	}

	public function get_carwash($cw)
	{
		$quer = Database::table('Reviews_Carwash')->where('cw_id', '=', $cw->id)->get();

		return get_entities($quer);
	}

	public function get_entities($reviews)
	{
		
	}
}


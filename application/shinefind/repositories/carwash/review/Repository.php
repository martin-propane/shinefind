<?php namespace Shinefind\Repositories;

use \stdClass;
use Laravel\Database;
use Shinefind\Entities\Carwash;

class Carwash_Review_Repository
{
	public function get_carwash($cw)
	{
		$quer = Database::table('Reviews_Carwash')->where('cw_id', '=', $cw->id)->get();

		return get_entities($quer);
	}

	public function get_entities($reviews)
	{
		
	}
}


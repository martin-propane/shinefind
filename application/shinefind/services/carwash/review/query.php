<?php namespace ShineFind\Services;

use Shinefind\Entities\Carwash_Review;
use Laravel\Database;

class Carwash_Review_Query
{
	protected $query;

	public $TABLE = 'Data_Reviews_Carwashes';
	public $ENTITY_TABLE = 'Data_Carwashes';
	public $joined_carwash = false;

	public function __construct($cw_id = null)
	{
		$this->query = Database::table($this->TABLE);

		if ($cw_id !== null)
			$this->cw_id_is($cw_id);
	}

	public function cw_id_is($cw_id)
	{
		$this->query = $this->query->where('cw_id', '=', $cw_id);
		
		return $this;
	}

	public function rating_is($rating)
	{
		$this->query = $this->query->where('rating', '=', $rating);
		
		return $this;
	}

	//joining with the carwash table is required in order to perform some queries
	public function city_is($city)
	{
		if (!$this->joined_carwash)
		{
			$this->joined_carwash = true;
			$this->query->join($this->ENTITY_TABLE, $this->TABLE.'.cw_id', '=', $this->ENTITY_TABLE.'.id');
		}

		$this->query->where('city', '=', $city);

		return $this;
	}

	public function state_is($state)
	{
		if (!$this->joined_carwash)
		{
			$this->joined_carwash = true;
			$this->query->join($this->ENTITY_TABLE, $this->TABLE.'.cw_id', '=', $this->ENTITY_TABLE.'.id');
		}

		$this->query->where('state', '=', $state);

		return $this;
	}

	public function sort_id($order = 'asc')
	{
		$this->query = $this->query->order_by('id', $order);

		return $this;
	}

	public function sort_timestamp($order = 'asc')
	{
		$this->query = $this->query->order_by('timestamp', $order);

		return $this;
	}

	public function sort_rating($order = 'asc')
	{
		$this->query = $this->query->order_by('rating', $order);

		return $this;
	}

	public function get()
	{
		$tuples = $this->query->get();

		$entities = array();

		foreach ($tuples as $tuple)
			$entities[] = $this->get_entity($tuple);

		return $entities;
	}

	public function count()
	{
		return $this->query->count();
	}

	public function average()
	{
		return $this->query->avg();
	}

	public function page($per_page, $page_num)
	{
		$tuples = $this->query->skip($per_page * $page_num)->take($per_page)->get();

		$entities = array();

		foreach ($tuples as $tuple)
			$entities[] = $this->get_entity($tuple);

		return $entities;
	}

	protected function get_entity($tuple)
	{
		return new Carwash_Review(get_object_vars($tuple));
	}
}


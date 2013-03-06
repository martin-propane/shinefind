<?php namespace ShineFind\Services;

use Shinefind\Entities\Carwash_Review;
use Laravel\Database;

class Carwash_Review_Query
{
	protected $query;

	public $TABLE = 'Data_Reviews_Carwashes';

	public function __construct($cw_id)
	{
		$this->query = Database::table($this->TABLE)->where('cw_id', '=', $cw_id);
	}

	public function rating_is($rating)
	{
		$this->query = $this->query->where('rating', '=', $rating);
		
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
			$entities[] = get_entity($tuple);

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


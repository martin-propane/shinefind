<?php namespace Shinefind\Services;

use \stdClass;
use Laravel\Database;
use Shinefind\Entities\Product;
use Shinefind\Entities\Product_Review;

class Product_Query
{
	public $query;
	public $TABLE = 'Data_Products';
	public $REVIEWS_TABLE = 'Data_Reviews_Products';
	public $RATINGS_VIEW = 'View_Product_Ratings';

	public function __construct()
	{
		$this->query = Database::table($this->TABLE);
	}

	public function name_like($name)
	{
		$this->query = $this->query->where('name', 'LIKE', '%' . $name . '%');

		return $this;
	}

	public function phone_like($phone)
	{
		if ($phone != '')
		{
			$phone = preg_replace('[\D]', '', $phone);

			if (strlen($phone) === 10)
				$phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . ' - ' . substr($phone, 6, 4);
		}

		$this->query = $this->query->where('phone', 'LIKE', '%'.$phone.'%');
		
		return $this;
	}

	public function type_is($type)
	{
		if ($type !== 'all')
			$this->query = $this->query->where('type', '=', $type);
		
		return $this;
	}

	public function sort_id($order = 'asc')
	{
		$this->query = $this->query->order_by('id', $order);

		return $this;
	}

	public function sort_name($order = 'asc')
	{
		$this->query = $this->query->order_by('name', $order);

		return $this;
	}

	public function sort_phone($order = 'asc')
	{
		$this->query = $this->query->order_by('phone', $order);

		return $this;
	}
	
	public function sort_website($order = 'asc')
	{
		$this->query = $this->query->order_by('website', $order);

		return $this;
	}

	public function sort_company($order = 'asc')
	{
		$this->query = $this->query->order_by('company', $order);

		return $this;
	}

	public function sort_rating($order = 'asc')
	{
		$this->query = $this->query->left_join($this->RATINGS_VIEW, $this->TABLE.'.id', '=', $this->RATINGS_VIEW.'.p_id')->order_by('rating', $order);

		return $this;
	}
	
	public function get()
	{
		return $this->get_entities($this->query->get());
	}

	public function count()
	{
		return $this->query->count();
	}

	public function page($per_page, $page_num)
	{
		$tuples = $this->query->skip($per_page * $page_num)->take($per_page)->get();

		return $this->get_entities($tuples);
	}

	public function get_reviews_average($p_id)
	{
		$avg = Database::table($this->REVIEWS_TABLE)->where('p_id', '=', $p_id)->avg('rating');

		return $avg;
	}

	public function get_reviews($p_id)
	{
		$tuples = Database::table($this->REVIEWS_TABLE)->where('p_id', '=', $p_id)->order_by('timestamp', 'desc')->get();

		$entities = array();

		foreach ($tuples as $tuple)
			$entities[] = $this->get_review_entity($tuple);

		return $entities;
	}

	protected function get_entities($relation)
	{
		$entities = array();

		foreach ($relation as $i=>$tuple) {
			$entities[$i] = $this->get_entity($tuple);
		}

		return $entities;
	}

	protected function get_entity($tuple)
	{
		$reviews = $this->get_reviews($tuple->id);
		$rating = $this->get_reviews_average($tuple->id);

		return new Product($tuple->id, $tuple->name, $tuple->company, $tuple->phone, $tuple->website, $tuple->type, $tuple->description, $reviews, $rating);
	}

	protected function get_review_entity($tuple)
	{
		return new Product_Review(get_object_vars($tuple));
	}
}

<?php namespace Shinefind\Repositories;

use \stdClass;
use Laravel\Database;
use Shinefind\Entities\Carwash;
use Shinefind\Entities\Carwash_Review;

class Carwash_Query
{
	public $query;
	public $SHORT_TYPES = array(
		'detailing'=>'Detailing',
		'freevac'=>'FreeVacuums',
		'fullservice'=>'FullService',
		'handwash'=>'HandWash',
		'mobile'=>'Mobile',
		'selfserve'=>'SelfServe',
		'softouch'=>'SoftTouch',
		'touchfree'=>'TouchFree',
		'tunnel'=>'Tunnel',
		'xpress'=>'Xpress'
	);
	public $SHORT_OPTIONS = array(
		'creditcards'=>'CreditCards',
		'conveniencestore'=>'ConvenienceStore',
		'fuel'=>'Fuel',
		'giftcards'=>'GiftCards',
		'oilchange'=>'OilChange',
		'other_other'=>'Other',
		'petwash'=>'PetWash',
		'salon'=>'Salon'
	);
	public $TABLE = 'Data_Carwashes';
	public $REVIEWS_TABLE = 'Data_Reviews_Carwashes';
	public $RATINGS_VIEW = 'View_Carwash_Ratings';

	public $check_types = array();

	public function __construct()
	{
		$this->query = Database::table($this->TABLE);
	}

	public function name_like($name)
	{
		$this->query = $this->query->where('name', 'LIKE', '%' . $name . '%');

		return $this;
	}

	public function city_like($city)
	{
		$this->query = $this->query->where('city', 'LIKE', '%'.$city.'%');
		return $this;
	}

	public function city_is($city)
	{
		$this->query = $this->query->where('city', '=', $city);
		return $this;
	}

	public function state_is($state)
	{
		$this->query = $this->query->where('state', '=', $state);
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
		if (isset($this->SHORT_TYPES[$type]))
		{
			$table = 'Type_' . $this->SHORT_TYPES[$type];
			$this->query = $this->query->join($table, $this->TABLE.'.id', '=', $table.'.cw_id');
		}
		else if ($type !== 'all')
		{
			//if there is no table for the type, then technically the type isn't this
			$this->query = $this->query->where('id', '=', 0);
		}

		return $this;
	}

	public function is_sponsored()
	{
		$this->query = $this->query->where('sponsored', '=', 1);

		return $this;
	}

	public function no_rating()
	{
		$this->query = $this->query->left_join($this->RATINGS_VIEW, $this->TABLE.'.id', '=', $this->RATINGS_VIEW.'.cw_id')->where('rating', '=', null);

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

	public function sort_busi_ad($order = 'asc')
	{
		$this->query = $this->query->order_by('business_address', $order);

		return $this;
	}
	
	public function sort_city($order = 'asc')
	{
		$this->query = $this->query->order_by('city', $order);

		return $this;
	}

	public function sort_state($order = 'asc')
	{
		$this->query = $this->query->order_by('state', $order);

		return $this;
	}

	public function sort_zip($order = 'asc')
	{
		$this->query = $this->query->order_by('zip', $order);

		return $this;
	}
	
	public function sort_phone($order = 'asc')
	{
		$this->query = $this->query->order_by('phone', $order);

		return $this;
	}
	
	public function sort_email($order = 'asc')
	{
		$this->query = $this->query->order_by('email', $order);

		return $this;
	}
	
	public function sort_website($order = 'asc')
	{
		$this->query = $this->query->order_by('website', $order);

		return $this;
	}
	
	public function sort_corp_ad($order = 'asc')
	{
		$this->query = $this->query->order_by('corp_address', $order);

		return $this;
	}

	public function sort_rating($order = 'asc')
	{
		$this->query = $this->query->left_join($this->RATINGS_VIEW, $this->TABLE.'.id', '=', $this->RATINGS_VIEW.'.cw_id')->order_by('rating', $order);

		return $this;
	}

	public function sort_certified($order = 'asc')
	{
		$this->query = $this->query->order_by('certified', $order);

		return $this;
	}

	public function get()
	{
		return $this->get_full_entities($this->query->get());
	}

	public function count()
	{
		return $this->query->count();
	}

	public function page($per_page, $page_num)
	{
		$tuples = $this->query->skip($per_page * $page_num)->take($per_page)->get();

		return $this->get_full_entities($tuples);
	}

	public function get_reviews_average($cw_id)
	{
		$avg = Database::table($this->REVIEWS_TABLE)->where('cw_id', '=', $cw_id)->avg('rating');

		return $avg;
	}

	public function get_reviews($cw_id)
	{
		$tuples = Database::table($this->REVIEWS_TABLE)->where('cw_id', '=', $cw_id)->order_by('timestamp', 'desc')->get();

		$entities = array();

		foreach ($tuples as $tuple)
			$entities[] = $this->get_review_entity($tuple);

		return $entities;
	}

	protected function get_entities($relation) {
		$entities = array();

		foreach ($relation as $i=>$tuple) {
			$entities[$i] = $this->get_entity($tuple, $tuple->types, $tuple->options);
		}

		return $entities;
	}

	protected function get_entity($tuple, $types_tuple = null, $options_tuple = null) {
		$reviews = $this->get_reviews($tuple->id);
		if (isset($tuple->rating))
			$rating = $tuple->rating;
		else
			$rating = $this->get_reviews_average($tuple->id);

		return new Carwash($tuple->id, $tuple->name, $tuple->business_address, $tuple->city, $tuple->state, $tuple->zip, $tuple->phone, $tuple->notes, $tuple->email, $tuple->website, $tuple->corp_address, $tuple->option_other, $tuple->certified, $reviews, $rating, $tuple->sponsored, $tuple->description, $tuple->caption, $types_tuple, $options_tuple);
	}

	protected function get_types_options($query_results)
	{
		$results = array();
		foreach ($query_results as $tuple)
		{
			$type_tuple = array();
			foreach ($this->SHORT_TYPES as $t=>$type)
				$type_tuple[$type] = Database::table('Type_' . $type)->where('cw_id', '=', $tuple->id)->first() !== null;

			$tuple->types = $type_tuple;

			$option_tuple = array();
			foreach ($this->SHORT_OPTIONS as $option)
				$option_tuple[$option] = Database::table('Other_' . $option)->where('cw_id', '=', $tuple->id)->first() !== null;
			$tuple->options = $option_tuple;
			
			$results[] = $tuple;
		}

		return $results;
	}

	protected function get_full_entities($relation)
	{
		return $this->get_entities($this->get_types_options($relation));
	}

	protected function get_review_entity($tuple)
	{
		return new Carwash_Review(get_object_vars($tuple));
	}
}


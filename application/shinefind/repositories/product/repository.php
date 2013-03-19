<?php namespace Shinefind\Repositories;

use Laravel\Database;
use Shinefind\Entities\Product;
use Shinefind\Entities\Product_Review;
use Shinefind\Services\Product_Query;
use Shinefind\Services\Product_Review_Validator;
use stdClass;

class Product_Repository {
	public $TABLE = 'Data_Products';
	public $REVIEWS_TABLE = 'Data_Reviews_Products';

	public function add($info) {
		$send = array();
		$name = $info['name'];

		if ($name == '')
			return 'Name was not given.';

		$company = $info['company'];
		$phone = $info['phone'];
		if ($phone != '')
		{
			$phone = preg_replace('[\D]', '', $phone);

			if (strlen($phone) != 10)
				return 'Phone number was not of correct length.';
			else
				$phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . ' - ' . substr($phone, 6, 4);
		}
		$website = $info['website'];
		$type = $info['type'];
		
		$db = Database::table($this->TABLE);

		$send['name'] = $name;

		if ($company != '')
			$send['company'] = $company;
		if ($phone != '')
			$send['phone'] = $phone;
		if ($website != '')
			$send['website'] = $website;
		if ($type != '')
			$send['type'] = $type;

		$id = $db->insert_get_id($send);

		return $id;
	}

	public function edit($id, $info) {
		$send = array();
		$name = $info['name'];

		$db = Database::table($this->TABLE);
		$max_id = $db->max('id');

		if ($id > $max_id && $id < 0)
			return 'Id is not in proper range.';

		$company = $info['company'];
		$phone = $info['phone'];
		if ($phone != '')
		{
			$phone = preg_replace('[\D]', '', $phone);

			if (strlen($phone) != 10)
				return 'Phone number was not of correct length.';
			else
				$phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . ' - ' . substr($phone, 6, 4);
		}
		$website = $info['website'];
		$type = $info['type'];
		
		if ($name == '')
			return 'Name is required.';

		$send['name'] = $name;
		$send['company'] = $company;
		$send['phone'] = $phone;
		$send['website'] = $website;
		$send['type'] = $type;

		$db->where('id', '=', $id)->update($send);

		return TRUE;
	}

	public function delete($id)
	{
		Database::table($this->TABLE)->delete($id);
	}

	public function query()
	{
		return new Product_Query();
	}

	public function get_product_type_count($type)
	{
		if ($type === 'all')
			return Database::table($this->TABLE)->count();
		else
			return Database::table($this->TABLE)->where('type', '=', $type)->count();
	}

	public function get_product_paged($type, $per_page, $page)
	{
		$info = new stdClass();

		$quer = Database::table($this->TABLE);

		if ($type !== 'all')
			$quer = $quer->where('type', '=', $type);

		$info->count = $quer->count();

		$results = $quer->take($per_page)->skip($per_page*($page - 1))->get();
		$info->page = $this->get_entities($results);
		$info->per_page = $per_page;

		return $info;
	}

	public function get($id) {
		//TODO: Properly check if id exists
		$db = Database::table($this->TABLE);
		$max_id = $db->max('id');

		if ($id > $max_id || $id < 0)
			return 'Id is not in proper range.';

		return $this->get_entity($db->where('id', '=', $id)->first());

	}

	public function get_entities($relation) {
		$entities = array();

		foreach ($relation as $i=>$tuple) {
			$entities[$i] = $this->get_entity($tuple);
		}

		return $entities;
	}

	public function get_entity($tuple) {
		$reviews = $this->get_reviews($tuple->id);
		$rating = $this->get_reviews_average($tuple->id);

		return new Product($tuple->id, $tuple->name, $tuple->company, $tuple->phone, $tuple->website, $tuple->type, $reviews, $rating);
	}

	public function get_all() {
		$quer = Database::table($this->TABLE)->get();
		return $this->get_entities($quer);
	}

	public function add_review(&$entity)
	{
		$props = get_object_vars($entity);

		if (Product_Review_Validator::validate($entity))
		{
			$id = Database::table($this->REVIEWS_TABLE)->insert_get_id($props);
			
			$entity->id = $id;

			return true;
		}
		else
			return false;
	}

	public function edit_review($entity)
	{
		$props = get_object_vars($entity);

		Database::table($this->REVIEWS_TABLE)->where('id', '=', $props->id)->update($props);
	}

	public function get_review($id)
	{
		$tuple = Database::table($this->REVIEWS_TABLE)->where('id', '=', $id)->first();

		return $this->get_review_entity($tuple);
	}

	public function get_reviews($p_id)
	{
		$tuples = Database::table($this->REVIEWS_TABLE)->where('p_id', '=', $p_id)->order_by('timestamp', 'desc')->get();

		$entities = array();

		foreach ($tuples as $tuple)
			$entities[] = $this->get_review_entity($tuple);

		return $entities;
	}

	public function get_reviews_average($p_id)
	{
		$avg = Database::table($this->REVIEWS_TABLE)->where('p_id', '=', $p_id)->avg('rating');

		return $avg;
	}

	protected function get_review_entity($tuple)
	{
		return new Product_Review(get_object_vars($tuple));
	}
}

?>




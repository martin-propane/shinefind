<?php namespace Shinefind\Repositories;

use Laravel\Database;
use Shinefind\Entities\Product;

class Product_Repository {
	public $TABLE = 'Data_Products';

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
		return new Product($tuple->id, $tuple->name, $tuple->company, $tuple->phone, $tuple->website, $tuple->type);
	}

	public function get_all() {
		$quer = Database::table($this->TABLE)->get();
		return $this->get_entities($quer);
	}
}

?>




<?php namespace Shinefind\Repositories;

use \stdClass;
use Laravel\Database;
use Shinefind\Entities\Carwash;
use Shinefind\Repositories\Carwash_Query;

class Carwash_Repository {
	public $TABLE = 'Data_Carwashes';

	public $DB_ATTRIBUTES = array('id', 'name', 'business_address', 'city', 'state', 'zip', 'phone', 'notes', 'email', 'website', 'corp_address', 'certified');
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

	public function add($info) {
		$send = array();
		$name = $info['name'];

		if ($name == '')
			return 'Name was not given.';
		$send['name'] = $name;

		$busi_ad = $info['busi_ad'];
		$city = $info['city'];
		$email = $info['email'];
		$state = $info['state'];
		$zip = $info['zip'];
		$phone = $info['phone'];
		if ($phone != '')
		{
			$phone = preg_replace('[\D]', '', $phone);

			if (strlen($phone) != 10)
				return 'Phone number was not of correct length.';
			else
				$phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . ' - ' . substr($phone, 6, 4);
		}

		$notes = $info['notes'];
		$website = $info['website'];
		$corp_ad = $info['corp_ad'];
		
		$db = Database::table($this->TABLE);

		if ($busi_ad != '')
			$send['business_address'] = $busi_ad;
		if ($city != '')
			$send['city'] = $city;
		if ($email != '')
			$send['email'] = $email;
		if ($state != '')
			$send['state'] = $state;
		if ($zip != '')
			$send['zip'] = $zip;
		if ($phone != '')
			$send['phone'] = $phone;
		if ($notes != '')
			$send['notes'] = $notes;
		if ($website != '')
			$send['website'] = $website;
		if ($corp_ad != '')
			$send['corp_address'] = $corp_ad;

		$id = $db->insert_get_id($send);

		foreach ($this->SHORT_TYPES as $short=>$db_table)
			if (array_key_exists($short, $info) && $info[$short] == true)
				Database::table('Type_'.$db_table)->insert(array('cw_id' => $id));

		foreach ($this->SHORT_OPTIONS as $short=>$db_table)
			if (array_key_exists($short, $info) && $info[$short] == true)
				Database::table('Other_'.$db_table)->insert(array('cw_id' => $id));

		return $id;
	}

	public function edit($id, $info) {
		$send = array();
		$name = $info['name'];

		$db = Database::table($this->TABLE);
		$max_id = $db->max('id');

		if ($id > $max_id && $id < 0)
			return 'Id is not in proper range.';

		$busi_ad = $info['busi_ad'];
		$city = $info['city'];
		$email = $info['email'];
		$state = $info['state'];
		$zip = $info['zip'];

		$phone = $info['phone'];
		if ($phone != '')
		{
			$phone = preg_replace('[\D]', '', $phone);

			if (strlen($phone) != 10)
				return 'Phone number was not of correct length.';
			else
				$phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . ' - ' . substr($phone, 6, 4);
		}

		$notes = $info['notes'];
		$website = $info['website'];
		$corp_ad = $info['corp_ad'];
		
		if ($name == '')
			return 'Name is required.';
		$send['name'] = $name;
		$send['business_address'] = $busi_ad;
		$send['city'] = $city;
		$send['email'] = $email;
		$send['state'] = $state;
		$send['zip'] = $zip;
		$send['phone'] = $phone;
		$send['notes'] = $notes;
		$send['website'] = $website;
		$send['corp_address'] = $corp_ad;

		$db->where('id', '=', $id)->update($send);

		foreach ($this->SHORT_TYPES as $s=>$type)
		{
			if (array_key_exists($s, $info) && $info[$s] == true)
			{
				$count = Database::table('Type_'.$type)->where('cw_id', '=', $id)->count();
				if ($count == 0)
					Database::table('Type_'.$type)->insert(array('cw_id' => $id));
			}
			else
				Database::table('Type_'.$type)->where('cw_id', '=', $id)->delete();
		}

		foreach ($this->SHORT_OPTIONS as $s=>$option)
		{
			if (array_key_exists($s, $info) && $info[$s] == true)
			{
				$count = Database::table('Other_'.$option)->where('cw_id', '=', $id)->count();
				if ($count == 0)
					Database::table('Other_'.$option)->insert(array('cw_id' => $id));
			}
			else
				Database::table('Other_'.$option)->where('cw_id', '=', $id)->delete();
		}

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

		$type_tuple = array();
		$option_tuple = array();
		foreach (Carwash::$TYPES as $type)
			$type_tuple[$type] = Database::table('Type_' . $type)->where('cw_id', '=', $id)->first() !== null;

		foreach (Carwash::$OPTIONS as $option)
			$option_tuple[$option] = Database::table('Other_' . $option)->where('cw_id', '=', $id)->first() !== null;

		return $this->get_entity($db->where('id', '=', $id)->first(), $type_tuple, $option_tuple);

	}

	protected function get_entities($relation) {
		$entities = array();

		foreach ($relation as $i=>$tuple) {
			$entities[$i] = $this->get_entity($tuple, $tuple->types, $tuple->options);
		}

		return $entities;
	}

	protected function get_entity($tuple, $types_tuple = null, $options_tuple = null) {
		return new Carwash($tuple->id, $tuple->name, $tuple->business_address, $tuple->city, $tuple->state, $tuple->zip, $tuple->phone, $tuple->notes, $tuple->email, $tuple->website, $tuple->corp_address, $tuple->certified, $types_tuple, $options_tuple);
	}

	protected function get_types_options($query_results)
	{
		foreach ($query_results as $tuple)
		{
			$type_tuple = array();
			foreach ($this->SHORT_TYPES as $type)
				$type_tuple[$type] = Database::table('Type_' . $type)->where('cw_id', '=', $tuple->id)->first() !== null;
			$tuple->types = $type_tuple;

			$option_tuple = array();
			foreach ($this->SHORT_OPTIONS as $option)
				$option_tuple[$option] = Database::table('Other_' . $option)->where('cw_id', '=', $tuple->id)->first() !== null;
			$tuple->options = $option_tuple;
		}

		return $query_results;
	}

	protected function get_full_entities($relation)
	{
		return $this->get_entities($this->get_types_options($relation));
	}

	public function get_all() {
		$quer = Database::table($this->TABLE)->get();

		//this is bad, necessary because of the way the tables are set up
		//need to consider changing, or not allowing lookup of all type/other info in get_all

		return $this->get_full_entities($quer);
	}

	public function get_state($state) {
		$quer = Database::table($this->TABLE)->where('state', '=', $state)->get();
		return $this->get_full_entities($quer);
	}

	public function get_city($state, $city) {
		$quer = Database::table($this->TABLE)->where('state', '=', $state)->where('city', '=', $city)->get();
		return $this->get_full_entities($quer);
	}

	public function get_city_paged($state, $city, $type, $per_page, $page = 1) {
		$info = new stdClass();

		$quer = Database::table($this->TABLE)->where('state', '=', $state)->where('city', '=', $city);
		$attributes = array();

		foreach ($this->DB_ATTRIBUTES as $name=>$val)
			$attributes[$name] = 'Data_Carwashes.' . $val;

		$TYPE_NAMES = array('fullservice'=>'Type_FullService', 'tunnel'=>'Type_Tunnel', 'handwash'=>'Type_HandWash', 'mobile'=>'Type_Mobile', 'detailing'=>'Type_Detailing');
		if (array_key_exists($type, $TYPE_NAMES))
		{
			$table_name = $TYPE_NAMES[$type];
			$quer = $quer->join($table_name, 'Data_Carwashes.id', '=', $table_name.'.cw_id');
		}

		$info->count = $quer->count();
		$results = $quer->take($per_page)->skip($per_page*($page - 1))->get($attributes);
		$info->page = $this->get_full_entities($results);
		$info->per_page = $per_page;

		return $info;
	}

	public function get_city_count($state, $city, $type = 'all')
	{
		$quer = Database::table($this->TABLE)->where('state', '=', $state)->where('city', '=', $city);
		
		$TYPE_NAMES = array('fullservice'=>'Type_FullService', 'tunnel'=>'Type_Tunnel', 'handwash'=>'Type_HandWash', 'mobile'=>'Type_Mobile', 'detailing'=>'Type_Detailing');
		if (array_key_exists($type, $TYPE_NAMES))
		{
			$table_name = $TYPE_NAMES[$type];
			$quer = $quer->join($table_name, 'Data_Carwashes.id', '=', $table_name.'.cw_id');
		}

		$count = $quer->count();

		return $count;
	}

	public function query()
	{
		return new Carwash_Query();
	}

	/*
	* Return a list of cities along with their states
	*/
	public function get_cities()
	{
		$tuples = Database::query(
			'SELECT * ' .
			'FROM (SELECT DISTINCT city, state ' .
			'FROM Data_Carwashes ' .
			'GROUP BY city, state ' .
			'ORDER BY count(*) desc ' .
			'LIMIT 0, 50) top ' .
			'ORDER BY state asc, city asc; ');

		foreach ($tuples as $tuple)
			$cities[] = (array) $tuple;

		uasort($cities, function($a, $b) {
			return $a['city'] > $b['city'];
		});
		uasort($cities, function($a, $b) {
			return $a['state'] > $b['state'];
		});

		return $cities;
	}
}

?>


<?php namespace Shinefind\Repositories;

use \stdClass;
use Laravel\Database;
use Shinefind\Entities\Carwash;

class Carwash_Repository {

	public function find($type, $others) {
		
	}

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
		
		$db = Database::table('Data_Carwashes');

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

		if (array_key_exists('detailing', $info))
			Database::table('Type_Detailing')->insert(array('cw_id' => $id));
		if (array_key_exists('freevac', $info))
			Database::table('Type_FreeVacuums')->insert(array('cw_id' => $id));
		if (array_key_exists('fullservice', $info))
			Database::table('Type_FullService')->insert(array('cw_id' => $id));
		if (array_key_exists('handwash', $info))
			Database::table('Type_HandWash')->insert(array('cw_id' => $id));
		if (array_key_exists('mobile', $info))
			Database::table('Type_Mobile')->insert(array('cw_id' => $id));
		if (array_key_exists('selfserve', $info))
			Database::table('Type_SelfServe')->insert(array('cw_id' => $id));
		if (array_key_exists('softtouch', $info))
			Database::table('Type_SoftTouch')->insert(array('cw_id' => $id));
		if (array_key_exists('touchfree', $info))
			Database::table('Type_TouchFree')->insert(array('cw_id' => $id));
		if (array_key_exists('tunnel', $info))
			Database::table('Type_Tunnel')->insert(array('cw_id' => $id));
		if (array_key_exists('xpress', $info))
			Database::table('Type_Xpress')->insert(array('cw_id' => $id));
		if (array_key_exists('creditcards', $info))
			Database::table('Other_CreditCards')->insert(array('cw_id' => $id));
		if (array_key_exists('conveniencestore', $info))
			Database::table('Other_ConvenienceStore')->insert(array('cw_id' => $id));
		if (array_key_exists('fuel', $info))
			Database::table('Other_Fuel')->insert(array('cw_id' => $id));
		if (array_key_exists('giftcards', $info))
			Database::table('Other_GiftCards')->insert(array('cw_id' => $id));
		if (array_key_exists('oilchange', $info))
			Database::table('Other_OilChange')->insert(array('cw_id' => $id));
		if (array_key_exists('other_other', $info))
			Database::table('Other_Other')->insert(array('cw_id' => $id));
		if (array_key_exists('petwash', $info))
			Database::table('Other_PetWash')->insert(array('cw_id' => $id));
		if (array_key_exists('salon', $info))
			Database::table('Other_Salon')->insert(array('cw_id' => $id));

		return $id;
	}

	public function edit($id, $info) {
		$send = array();
		$name = $info['name'];

		$db = Database::table('Data_Carwashes');
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

		//TODO: Replace manual code for types and options with code that uses array

		if (array_key_exists('detailing', $info) && $info['detailing'] == true)
		{
			$count = Database::table('Type_Detailing')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_Detailing')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_Detailing')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('freevac', $info) && $info['freevac'] == true)
		{
			$count = Database::table('Type_FreeVacuums')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_FreeVacuums')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_FreeVacuums')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('fullservice', $info) && $info['fullservice'] == true)
		{
			$count = Database::table('Type_FullService')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_FullService')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_FullService')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('handwash', $info) && $info['handwash'] == true)
		{
			$count = Database::table('Type_HandWash')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_HandWash')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_HandWash')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('mobile', $info) && $info['mobile'] == true)
		{
			$count = Database::table('Type_Mobile')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_Mobile')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_Mobile')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('selfserve', $info) && $info['selfserve'] == true)
		{
			$count = Database::table('Type_SelfServe')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_SelfServe')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_SelfServe')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('softtouch', $info) && $info['softtouch'] == true)
		{
			$count = Database::table('Type_SoftTouch')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_SoftTouch')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_SoftTouch')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('touchfree', $info) && $info['touchfree'] == true)
		{
			$count = Database::table('Type_TouchFree')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_TouchFree')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_TouchFree')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('tunnel', $info) && $info['tunnel'] == true)
		{
			$count = Database::table('Type_Tunnel')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_Tunnel')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_Tunnel')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('xpress', $info) && $info['xpress'] == true)
		{
			$count = Database::table('Type_Xpress')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Type_Xpress')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Type_Xpress')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('creditcards', $info) && $info['creditcards'] == true)
		{
			$count = Database::table('Other_CreditCards')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_CreditCards')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_CreditCards')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('conveniencestore', $info) && $info['conveniencestore'] == true)
		{
			$count = Database::table('Other_ConvenienceStore')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_ConvenienceStore')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_ConvenienceStore')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('fuel', $info) && $info['fuel'] == true)
		{
			$count = Database::table('Other_Fuel')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_Fuel')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_Fuel')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('giftcards', $info) && $info['giftcards'] == true)
		{
			$count = Database::table('Other_GiftCards')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_GiftCards')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_GiftCards')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('oilchange', $info) && $info['oilchange'] == true)
		{
			$count = Database::table('Other_OilChange')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_OilChange')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_OilChange')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('other_other', $info) && $info['other_other'] == true)
		{
			$count = Database::table('Other_Other')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_Other')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_Other')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('petwash', $info) && $info['petwash'] == true)
		{
			$count = Database::table('Other_PetWash')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_PetWash')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_PetWash')->where('cw_id', '=', $id)->delete();

		if (array_key_exists('salon', $info) && $info['salon'] == true)
		{
			$count = Database::table('Other_Salon')->where('cw_id', '=', $id)->count();
			if ($count == 0)
				Database::table('Other_Salon')->insert(array('cw_id' => $id));
		}
		else
			Database::table('Other_Salon')->where('cw_id', '=', $id)->delete();

		return TRUE;
	}

	public function get($id) {
		//TODO: Properly check if id exists
		$db = Database::table('Data_Carwashes');
		$max_id = $db->max('id');

		if ($id > $max_id || $id < 0)
			return 'Id is not in proper range.';

		$type_tuple = array();
		$option_tuple = array();
		foreach (Carwash::$TYPES as $type)
			$type_tuple[$type] = Database::table('Type_' . $type)->where('cw_id', '=', $id)->first();

		foreach (Carwash::$OPTIONS as $option)
			$option_tuple[$option] = Database::table('Other_' . $option)->where('cw_id', '=', $id)->first();

		return $this->get_entity($db->where('id', '=', $id)->first(), $type_tuple, $option_tuple);

	}

	public function get_entities($relation) {
		$entities = array();

		foreach ($relation as $i=>$tuple) {
			$entities[$i] = $this->get_entity($tuple, null, null);
		}

		return $entities;
	}

	public function get_entity($tuple, $types_tuple = null, $options_tuple = null) {
		return new Carwash($tuple->id, $tuple->name, $tuple->business_address, $tuple->city, $tuple->state, $tuple->zip, $tuple->phone, $tuple->notes, $tuple->email, $tuple->website, $tuple->corp_address, $types_tuple, $options_tuple);
	}

	public function get_all() {
		$quer = Database::table('Data_Carwashes')->get();
		return $this->get_entities($quer);
	}

	public function get_state() {
		$quer = Database::table('Data_Carwashes')->where('state', '=', $state)->get();
		return $this->get_entities($quer);
	}

	public function get_city($state, $city) {
		$quer = Database::table('Data_Carwashes')->where('state', '=', $state)->where('city', '=', $city)->get();
		return $this->get_entities($quer);
	}

	public function get_city_paged($state, $city, $per_page, $page = 1) {
		$info = new stdClass();

		$quer = Database::table('Data_Carwashes')->where('state', '=', $state)->where('city', '=', $city);
		$info->count = $quer->count();
		$results = $quer->take($per_page)->skip($per_page*($page - 1))->get();
		$info->page = $this->get_entities($results);
		$info->per_page = $per_page;

		return $info;
	}
}

?>


<?php namespace Shinefind\Repositories;

use Laravel\Database;
use Shinefind\Entities\Association;

class Association_Repository {
	public $TABLE = 'Data_Associations';

	public function add($info) {
		$send = array();
		$name = $info['name'];

		if ($name == '')
			return 'Name was not given.';

		$address = $info['address'];
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
		$fax = $info['fax'];
		if ($fax != '')
		{
			$fax = preg_replace('[\D]', '', $fax);

			if (strlen($fax) != 10)
				return 'Fax number was not of correct length.';
			else
				$fax = '(' . substr($fax, 0, 3) . ') ' . substr($fax, 3, 3) . ' - ' . substr($fax, 6, 4);
		}

		$notes = $info['notes'];
		$website = $info['website'];
		$fee = $info['fee'];
		
		$db = Database::table($this->TABLE);

		$send['name'] = $name;
		if ($address != '')
			$send['address'] = $address;
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
		if ($fax != '')
			$send['fax'] = $fax;
		if ($notes != '')
			$send['notes'] = $notes;
		if ($website != '')
			$send['website'] = $website;
		if ($fee != '')
			$send['fee'] = $fee;

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

		$address = $info['address'];
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
		$fax = $info['fax'];
		if ($fax != '')
		{
			$fax = preg_replace('[\D]', '', $fax);

			if (strlen($fax) != 10)
				return 'Fax number was not of correct length.';
			else
				$fax = '(' . substr($fax, 0, 3) . ') ' . substr($fax, 3, 3) . ' - ' . substr($fax, 6, 4);
		}

		$notes = $info['notes'];
		$website = $info['website'];
		$fee = $info['fee'];
		
		if ($name == '')
			return 'Name is required.';
		$send['name'] = $name;
		$send['address'] = $address;
		$send['city'] = $city;
		$send['email'] = $email;
		$send['state'] = $state;
		$send['zip'] = $zip;
		$send['phone'] = $phone;
		$send['fax'] = $fax;
		$send['notes'] = $notes;
		$send['website'] = $website;
		$send['fee'] = $fee;

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
		return new Association($tuple->id, $tuple->name, $tuple->address, $tuple->city, $tuple->state, $tuple->zip, $tuple->phone, $tuple->fax, $tuple->notes, $tuple->email, $tuple->website, $tuple->fee);
	}

	public function get_all() {
		$quer = Database::table($this->TABLE)->get();
		return $this->get_entities($quer);
	}
}

?>



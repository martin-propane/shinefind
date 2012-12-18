<?php namespace Shinefind\Entities;

class Association {

	public $id;
	public $name;
	public $address;
	public $city;
	public $state;
	public $zip;
	public $phone;
	public $fax;
	public $notes;
	public $email;
	public $website;
	public $fee;

	public function __construct($id, $name, $address, $city, $state, $zip, $phone, $fax, $notes, $email, $website, $fee)
	{
		$this->id = $id;
		$this->name = $name;
		$this->address = $address;
		$this->city = $city;
		$this->state = $state;
		$this->zip = $zip;
		$this->phone = $phone;
		$this->fax = $fax;
		$this->notes = $notes;
		$this->email = $email;
		$this->website = $website;
		$this->fee = $fee;
	}
}

?>


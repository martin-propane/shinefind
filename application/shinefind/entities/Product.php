<?php namespace Shinefind\Entities;

class Product {

	public $id;
	public $name;
	public $company;
	public $phone;
	public $website;
	public $type;

	public function __construct($id, $name, $company, $phone, $website, $type)
	{
		$this->id = $id;
		$this->name = $name;
		$this->company = $company;
		$this->phone = $phone;
		$this->website = $website;
		$this->type = $type;
	}
}

?>



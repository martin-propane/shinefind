<?php namespace Shinefind\Entities;

class Carwash {

	public $id;
	public $name;
	public $busi_ad;
	public $city;
	public $state;
	public $zip;
	public $phone;
	public $notes;
	public $email;
	public $website;
	public $corp_ad;
	public $option_other;
	public $types;
	public $options;
	public $certified;
	public $reviews;
	public $rating;
	public $sponsored;
	public $sponsor_description;

	public static $TYPES = array('Detailing', 'FreeVacuums', 'FullService', 'HandWash', 'Mobile', 'SelfServe', 'SoftTouch', 'TouchFree', 'Tunnel', 'Xpress');
	public static $OPTIONS = array('ConvenienceStore', 'CreditCards', 'Fuel', 'Fundraiser', 'GiftCards', 'MilitaryDiscount', 'OilChange', 'Other', 'PetWash', 'Salon', 'SeniorDiscount');

	public function __construct($id, $name, $busi_ad, $city, $state, $zip, $phone, $notes, $email, $website, $corp_ad, $option_other, $certified, $reviews, $rating, $sponsored, $sponsor_description, $types, $options)
	{
		if ($types === null)
			$types = array();

		foreach (Carwash::$TYPES as $type)
			if (!array_key_exists($type, $types))
				$types[$type] = false;

		if ($options === null)
			$options = array();

		foreach (Carwash::$OPTIONS as $option)
			if (!array_key_exists($option, $options))
				$options[$option] = false; 

		$this->id = $id;
		$this->name = $name;
		$this->busi_ad = $busi_ad;
		$this->city = $city;
		$this->state = $state;
		$this->zip = $zip;
		$this->phone = $phone;
		$this->notes = $notes;
		$this->email = $email;
		$this->website = $website;
		$this->corp_ad = $corp_ad;
		$this->option_other = $option_other;
		$this->types = $types;
		$this->options = $options;
		$this->certified = $certified;
		$this->reviews = $reviews;
		$this->rating = $rating;
		$this->sponsored = $sponsored;
		$this->sponsor_description = $sponsor_description;
	}
}

?>

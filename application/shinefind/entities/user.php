<?php namespace Shinefind\Entities;

class User extends Base
{
	protected $properties = array('id', 'email', 'password', 'admin', 'first_name', 'last_name', 'newsletter', 'city', 'state', 'zip');

	public function __construct($values)
	{
		parent::__construct($this->properties, $values);
	}
}


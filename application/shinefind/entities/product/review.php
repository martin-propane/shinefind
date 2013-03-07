<?php namespace Shinefind\Entities;

class Product_Review extends Base
{
	protected $properties = array('id', 'p_id', 'rating', 'title', 'review', 'timestamp');

	public function __construct($values)
	{
		parent::__construct($this->properties, $values);
	}
}

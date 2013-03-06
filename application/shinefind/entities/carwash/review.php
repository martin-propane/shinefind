<?php namespace Shinefind\Entities;

class Carwash_Review extends Base
{
	protected $properties = array('id', 'cw_id', 'rating', 'title', 'review', 'timestamp');

	public function __construct($values)
	{
		parent::__construct($this->properties, $values);
	}
}

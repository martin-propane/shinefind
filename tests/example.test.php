<?php

class TestExample extends PHPUnit_Framework_TestCase {

	/**
	 * Test that a given condition is met.
	 *
	 * @return void
	 */
	public function testSomethingIsTrue()
	{
		echo('does thsi work');
		$cw_repo = IoC::resolve('association_repository');
		$carwashes = $cw_repo->get_all();
		echo var_dump($carwashes);
		$this->assertTrue(true);
	}

}

class TestCarwash_Repository extends PHPUnit_Framework_TestCase
{
	//public function testAddCarw
}


class Carwash_Repository {
	public $DB_ATTRIBUTES = array('id', 'name', 'business_address', 'city', 'state', 'zip', 'phone', 'notes', 'email', 'website', 'corp_address', 'certified');

	public function find($type, $others) {
		
	}

	public function add($info) {
	}

	public function edit($id, $info) {
	}

	public function get($id) {
		return new Carwash($id, 'Bob', '1234 Alice Drive', 'TestCity', 'TS', '33333', '(901) 123 - 3456', 'Test notes.', 'test@test.com', 'http://www.test.com/', '', 1, array(), array());

	}

	public function get_entities($relation) {
	}

	public function get_entity($tuple, $types_tuple = null, $options_tuple = null) {
	}

	public function get_all() {
	}

	public function get_state() {
	}

	public function get_city($state, $city) {
	}

	public function get_city_paged($state, $city, $type, $per_page, $page = 1) {
	}

	public function get_city_count($state, $city, $type = 'all')
	{
	}
}
?>



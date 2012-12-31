<?php
class TestCarwash_Repository extends PHPUnit_Framework_TestCase
{
	//public function testAddCarw

	public function setUp()
	{
		$this->cw_repo = IoC::resolve('carwash_repository');

		$this->params = array(
			'name' => 'UnitCarwash',
			'busi_ad' => '1234 Unit Test Drive',
			'city' => 'Memphis',
			'state' => 'TN',
			'email' => 'test@test.com',
			'zip' => '38104',
			'phone' => '9011234567',
			'notes' => 'Lorem ipsum ...',
			'website' => 'http://www.shinefind.com/',
			'corp_ad' => '4321 Evird Tset Tinu',

			'detailing' => true,
			'freevac' => true,
			'fullservice' => true,
			'handwash' => true,
			'mobile' => true,
			'selfserve' => true,
			'softtouch' => true,
			'touchfree' => true,
			'tunnel' => true,
			'xpress' => true,

			'creditcards' => true,
			'conveniencestore' => true,
			'fuel' => true,
			'giftcards' => true,
			'oilchange' => true,
			'other_other' => true,
			'petwash' => true,
			'salon' => true
		);

		$this->added_id = $this->cw_repo->add($this->params);
	}

	protected function formatPhone($phone)
	{
		if ($phone != '')
		{
			$phone = preg_replace('[\D]', '', $phone);

			if (strlen($phone) != 10)
				return '';
			else
				$phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . ' - ' . substr($phone, 6, 4);
		}

		return $phone;
	}

	public function testRepositoryAddsAndGetsData()
	{
		$cw = $this->cw_repo->get($this->added_id);
		$params = $this->params;
		
		$this->assertEquals($cw->name, $this->params['name']);
		$this->assertEquals($cw->busi_ad, $this->params['busi_ad']);
		$this->assertEquals($cw->city, $this->params['city']);
		$this->assertEquals($cw->state, $this->params['state']);
		$this->assertEquals($cw->email, $this->params['email']);
		$this->assertEquals($cw->zip, $this->params['zip']);
		$this->assertEquals($cw->phone, $this->formatPhone($this->params['phone']));
		$this->assertEquals($cw->notes, $this->params['notes']);
		$this->assertEquals($cw->website, $this->params['website']);
		$this->assertEquals($cw->corp_ad, $this->params['corp_ad']);
		$this->assertEquals($cw->id, $this->added_id);

		//Types and options are set as long as their keys exist
		if (array_key_exists('detailing', $params))
			$this->assertArrayHasKey('Detailing', $cw->types);
		if (array_key_exists('freevac', $params))
			$this->assertArrayHasKey('FreeVacuums', $cw->types);
		if (array_key_exists('fullservice', $params))
			$this->assertArrayHasKey('FullService', $cw->types);
		if (array_key_exists('handwash', $params))
			$this->assertArrayHasKey('HandWash', $cw->types);
		if (array_key_exists('mobile', $params))
			$this->assertArrayHasKey('Mobile', $cw->types);
		if (array_key_exists('selfserve', $params))
			$this->assertArrayHasKey('SelfServe', $cw->types);
		if (array_key_exists('touchfree', $params))
			$this->assertArrayHasKey('TouchFree', $cw->types);
		if (array_key_exists('tunnel', $params))
			$this->assertArrayHasKey('Tunnel', $cw->types);
		if (array_key_exists('xpress', $params))
			$this->assertArrayHasKey('Xpress', $cw->types);

		if (array_key_exists('creditcards', $params))
			$this->assertArrayHasKey('CreditCards', $cw->options);
		if (array_key_exists('conveniencestore', $params))
			$this->assertArrayHasKey('ConvenienceStore', $cw->options);
		if (array_key_exists('fuel', $params))
			$this->assertArrayHasKey('Fuel', $cw->options);
		if (array_key_exists('giftcards', $params))
			$this->assertArrayHasKey('GiftCards', $cw->options);
		if (array_key_exists('oilchange', $params))
			$this->assertArrayHasKey('OilChange', $cw->options);
		if (array_key_exists('other_other', $params))
			$this->assertArrayHasKey('Other', $cw->options);
		if (array_key_exists('petwash', $params))
			$this->assertArrayHasKey('PetWash', $cw->options);
		if (array_key_exists('salon', $params))
			$this->assertArrayHasKey('Salon', $cw->options);
	}
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



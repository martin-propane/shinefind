<?php

use Laravel\CLI\Command;

class TestCarwash_Repository extends PHPUnit_Framework_TestCase
{
	//public function testAddCarw

	public function setUp()
	{
		Command::run(array('ClearDatabase'));

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


		$this->params2 = array(
			'name' => 'UnitCarwash2',
			'busi_ad' => '1234 Unit Test Drive2',
			'city' => 'Memphis2',
			'state' => 'TX',
			'email' => 'test2@test.com',
			'zip' => '38102',
			'phone' => '9011234562',
			'notes' => 'Lorem ipsum ...2',
			'website' => 'http://www.shinefind2.com/',
			'corp_ad' => '4321 Evird Tset Tinu2',

			'detailing' => false,
			'freevac' => false,
			'fullservice' => false,
			'handwash' => false,
			'mobile' => true,
			'selfserve' => false,
			'softtouch' => false,
			'touchfree' => false,
			'tunnel' => false,
			'xpress' => false,

			'creditcards' => false,
			'conveniencestore' => false,
			'fuel' => false,
			'giftcards' => false,
			'oilchange' => false,
			'other_other' => false,
			'petwash' => false,
			'salon' => false
		);

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
		$this->id1 = $this->cw_repo->add($this->params);
		
		$cw = $this->cw_repo->get($this->id1);
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
		$this->assertEquals($cw->id, $this->id1);

		foreach ($this->cw_repo->SHORT_TYPES as $short=>$index)
		{
			if (array_key_exists($short, $params) && $params[$short] == true)
				$this->assertTrue($cw->types[$index]);
			else
				$this->assertFalse($cw->types[$index]);
		}

		foreach ($this->cw_repo->SHORT_OPTIONS as $short=>$index)
		{
			if (array_key_exists($short, $params) && $params[$short] == true)
				$this->assertTrue($cw->options[$index]);
			else
				$this->assertFalse($cw->options[$index]);
		}
	}
	/**
	 * @depends testRepositoryAddsAndGetsData
	  */
	public function testRepositoryAddsSecond()
	{
		$this->id2 = $this->cw_repo->add($this->params2);

		$cw = $this->cw_repo->get($this->id2);

		$params = $this->params2;

		$this->assertEquals($cw->name, $this->params2['name']);
		$this->assertEquals($cw->busi_ad, $this->params2['busi_ad']);
		$this->assertEquals($cw->city, $this->params2['city']);
		$this->assertEquals($cw->state, $this->params2['state']);
		$this->assertEquals($cw->email, $this->params2['email']);
		$this->assertEquals($cw->zip, $this->params2['zip']);
		$this->assertEquals($cw->phone, $this->formatPhone($this->params2['phone']));
		$this->assertEquals($cw->notes, $this->params2['notes']);
		$this->assertEquals($cw->website, $this->params2['website']);
		$this->assertEquals($cw->corp_ad, $this->params2['corp_ad']);
		$this->assertEquals($cw->id, $this->id2);

		foreach ($this->cw_repo->SHORT_TYPES as $short=>$index)
		{
			if (array_key_exists($short, $params) && $params[$short] == true)
				$this->assertTrue($cw->types[$index]);
			else
				$this->assertFalse($cw->types[$index]);
		}

		foreach ($this->cw_repo->SHORT_OPTIONS as $short=>$index)
		{
			if (array_key_exists($short, $params) && $params[$short] == true)
				$this->assertTrue($cw->options[$index]);
			else
				$this->assertFalse($cw->options[$index]);
		}
	}
	/**
	 * @depends testRepositoryAddsSecond
	 */
	public function testRepositoryViewsAll()
	{
		$carwashes = $this->cw_repo->get_all();

		
	}
}
?>



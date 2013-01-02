<?php

use Laravel\CLI\Command;

class TestCarwash_Repository extends PHPUnit_Framework_TestCase
{
	//public function testAddCarw

	public function setUp()
	{
		Command::run(array('ClearDatabase'));
		$this->cw_repo = IoC::resolve('carwash_repository');

		$this->params[0] = array(
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


		$this->params[1] = array(
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

	protected function assertCarwashEquals($cw, $params, $id)
	{
		$this->assertEquals($cw->name, $params['name']);
		$this->assertEquals($cw->busi_ad, $params['busi_ad']);
		$this->assertEquals($cw->city, $params['city']);
		$this->assertEquals($cw->state, $params['state']);
		$this->assertEquals($cw->email, $params['email']);
		$this->assertEquals($cw->zip, $params['zip']);
		$this->assertEquals($cw->phone, $this->formatPhone($params['phone']));
		$this->assertEquals($cw->notes, $params['notes']);
		$this->assertEquals($cw->website, $params['website']);
		$this->assertEquals($cw->corp_ad, $params['corp_ad']);
		$this->assertEquals($cw->id, $id);

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

	public function testRepositoryAddsAndGetsCarwash()
	{
		$params = $this->params[0];
		$id = $this->cw_repo->add($params);
		
		$cw = $this->cw_repo->get($id);

		$this->assertCarwashEquals($cw, $params, $id);
	}
	/**
	 * @depends testRepositoryAddsAndGetsCarwash
	 */
	public function testRepositoryEditsCarwash()
	{
		$id = $this->cw_repo->add($this->params[0]);

		$this->cw_repo->edit($id, $this->params[1]);
		$cw = $this->cw_repo->get($id);

		$this->assertCarwashEquals($cw, $this->params[1], $id);
	}

	/**
	 * @depends testRepositoryAddsAndGetsCarwash
	 */
	public function testRepositoryViewsAll()
	{
		foreach ($this->params as $i=>$params)
		{
			$id = $this->cw_repo->add($params);
			$tuple_params[$id] = $i;
		}

		$carwashes = $this->cw_repo->get_all();

		$this->assertEquals(count($carwashes), 2);

		foreach ($carwashes as $cw)
			$this->assertCarwashEquals($cw, $this->params[$tuple_params[$cw->id]], $cw->id);
	}
}
?>



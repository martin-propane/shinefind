<?php

use Laravel\CLI\Command;

class TestCarwash_Review_Repository extends PHPUnit_Framework_TestCase
{
	public setUp()
	{
		$this->params[0] = array(
			'cw_id'=>'0',
			'rating'=>'4',
			'review'=>'Unit test review!'
		);

		$cwr_repo = IoC::resolve('carwash_review_repository');
	}

	public testAddGet()
	{
		$cwr_repo = IoC::resolve('carwash_review_repository');

		$id = $cwr_repo->add($this->params[0]);

		$cwr = $cwr_repo->get($id);
	}
}


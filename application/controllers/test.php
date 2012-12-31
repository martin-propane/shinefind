<?php 
use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Test_Controller extends Base_Controller {

	public function action_index()
	{
		//$cw_rep = IoC::resolve('cw_repo');
		//$cw_rep = Shinefind\Repositories\Carwash_Repository::newInstance();
		$cw = new Carwash_Repository();//IoC::resolve('carwash');
		//$test = Shinefind\Entities\Carwash::test();
		return View::make('test.index')->with('foo', $arr['grawr']);
	}

}


<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Admin_Panel_Controller extends Base_Controller {

	public $restful = true;
	public $layout = 'layouts.admin';

	public function get_index()
	{
		return View::make('Admin.Panel.index');
	}

	public function get_add_location()
	{
		$this->layout->title = 'Add Location';
		$this->layout->nest('content', 'Admin.Panel.add_location', array());
	}

	public function post_add_location()
	{
		$this->layout->title = "Add Location";

		$cw_repo = IoC::resolve('carwash_repository');
		$res = $cw_repo->add(Input::all());

		if ($res === TRUE)
			return Response::make('Succesful submission!');
		else
			return Response::make($res);
	}

	public function get_view_all()
	{
		$this->layout->title = 'Carwashes';
		
		$cw_repo = IoC::resolve('carwash_repository');
		$res = $cw_repo->get_all();

		$this->layout->nest('content', 'Admin.Panel.view_all', array('carwashes' => $res));
	}
}

?>


<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Admin_Carwashes_Controller extends Base_Controller {
	
	public $restful = true;

	public function get_edit($id)
	{
		$cw_repo = IoC::resolve('carwash_repository');

		$cw = $cw_repo->get($id);
		$arr = get_object_vars($cw);
		return View::make('Admin.Carwashes.edit', get_object_vars($cw));
	}

	public function post_edit($id)
	{
		$cw_repo = IoC::resolve('carwash_repository');

		$res = $cw_repo->edit($id, Input::all());

		//if ($res === TRUE)
		//	return Redirect::to_action('admin.panel@view_all');
		//else
			return Response::make($res);
	}
}

?>

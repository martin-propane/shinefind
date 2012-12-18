<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Admin_Carwashes_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.admin';

	public function get_edit($id)
	{
		$this->layout->title = 'Edit Carwash';

		$cw_repo = IoC::resolve('carwash_repository');

		$cw = $cw_repo->get($id);

		$arr = get_object_vars($cw);
		$this->layout->nest('content', 'Admin.Carwashes.edit', get_object_vars($cw));
	}

	public function post_edit($id)
	{
		$cw_repo = IoC::resolve('carwash_repository');

		$res = $cw_repo->edit($id, Input::all());

		return Redirect::to_action('Admin.Panel.view_all');
	}
}

?>

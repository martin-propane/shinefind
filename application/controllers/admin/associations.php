<?php

use Shinefind\Repositories\Association_Repository;
use Shinefind\Entities\Association;

class Admin_Associations_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.admin';

	public function get_add()
	{
		$this->layout->title = 'Add Association';
		$this->layout->nest('content', 'Admin.Associations.add', array());
	}

	public function post_add()
	{
		$this->layout->title = "Add Association";

		$cw_repo = IoC::resolve('association_repository');
		$res = $cw_repo->add(Input::all());

		return Redirect::to_action('Admin.Associations.view');
	}

	public function get_edit($id)
	{
		$this->layout->title = 'Edit Association';

		$cw_repo = IoC::resolve('association_repository');

		$cw = $cw_repo->get($id);

		$arr = get_object_vars($cw);
		$this->layout->nest('content', 'Admin.Associations.edit', get_object_vars($cw));
	}

	public function post_edit($id)
	{
		$cw_repo = IoC::resolve('association_repository');

		$res = $cw_repo->edit($id, Input::all());

		return Redirect::to_action('Admin.Associations.view');
	}

	public function get_view()
	{
		$this->layout->title = 'Associations';
	
		$cw_repo = IoC::resolve('association_repository');
		$res = $cw_repo->get_all();

		$this->layout->nest('content', 'Admin.Associations.view', array('associations' => $res));
	}
}

?>

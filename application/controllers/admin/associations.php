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

		$a_repo = IoC::resolve('association_repository');
		$res = $a_repo->add(Input::all());

		return Redirect::to_action('Admin.Associations.view');
	}

	public function get_edit($id)
	{
		$this->layout->title = 'Edit Association';

		$a_repo = IoC::resolve('association_repository');

		$cw = $a_repo->get($id);

		$arr = get_object_vars($cw);
		$this->layout->nest('content', 'Admin.Associations.edit', get_object_vars($cw));
	}

	public function post_edit($id)
	{
		$a_repo = IoC::resolve('association_repository');

		$res = $a_repo->edit($id, Input::all());

		return Redirect::to_action('Admin.Associations.view');
	}


	public function get_delete($id)
	{
		$this->layout->title = 'Delete User';
		$a_repo = IoC::resolve('association_repository');
		$a_repo->delete($id);

		return Redirect::to_action('Admin.Associations.view');
	}

	public function get_view()
	{
		$this->layout->title = 'Associations';
	
		$a_repo = IoC::resolve('association_repository');
		$res = $a_repo->get_all();

		$this->layout->nest('content', 'Admin.Associations.view', array('associations' => $res));
	}
}

?>

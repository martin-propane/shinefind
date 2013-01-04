<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Admin_Panel_Controller extends Base_Controller {

	public $restful = true;
	public $layout = 'layouts.admin';

	public function get_index()
	{
		return Redirect::to_action('Admin.Carwashes.view');
		return View::make('Admin.Panel.index');
	}

}

?>


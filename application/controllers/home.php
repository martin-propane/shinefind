<?php

class Home_Controller extends Base_Controller
{
	public$restful = true;
	public $layout = 'layouts.frontend';


	public function get_index()
	{
		if (Auth::check())
			return Redirect::to_action('admin.panel@index');
		$this->layout->title = 'ShineFind';
		$this->layout->nest('content', 'home.index', array());
	}
}


<?php

class Home_Controller extends Base_Controller
{
	public$restful = true;
	public $layout = 'layouts.frontend.basic';


	public function get_index()
	{
		$this->layout->title = 'ShineFind';

		$current_city = Cookie::get('city');
		$current_state = Cookie::get('state');

		$this->layout->nest('content', 'home.index', array('current_city'=>$current_city, 'current_state'=>$current_state));
	}

	public function post_city()
	{
		$old_city = Cookie::get('city');
		$old_state = Cookie::get('state');

		$new_city = Input::get('city');
		$new_state = Input::get('state');
		
		if ($new_city !== $old_city || $new_state !== $old_state)
		{
			Cookie::forever('city', $new_city);
			Cookie::forever('state', $new_state);
		}
		
		//now the reqiest should be redirected to the previous page
		//GET parameters are removed since the application state just changed
		$referrer = Request::referrer();
		$url = parse_url($referrer);
		$path = $url['path'];
		
		//this looks messy, but it seems to work for getting rid of the query string from a url
		return Redirect::to($url['scheme'] . '://' . $url['host'] . (isset($url['port']) ? ':'.$url['port'] : '') . $path);
	}
}


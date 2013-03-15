<?php

class User_Controller extends Base_Controller
{
	public$restful = true;
	public $layout = 'layouts.frontend.static';


	public function get_login()
	{
		if (Auth::check())
			return Redirect::to_action(Request::referrer());

		$this->layout->title = 'Login';
		$this->layout->nest('content', 'user.login', array());
	}

	public function post_login()
	{
		if (Auth::check())
			return Redirect::to_action(Request::referrer());

		$email = Input::get('email');
		$password = Input::get('password');

		$auth = Auth::attempt(array('username' => $email, 'password' => $password));

		if ($auth)
		{
			$user_repo = IoC::resolve('user_repository');
			$user = $user_repo->get_with_email($email);
			if ($user->admin > 0)
				return Redirect::to_action('admin.panel@index');
			else
				return Redirect::to('/');
		}
		else
			return Response::make('You were not logged in.');
	}

	public function get_register()
	{
		if (Auth::check())
			return Redirect::to('/');

		$city = Cookie::get('city');
		$state = Cookie::get('state');

		$cw_repo = IoC::resolve('carwash_repository');
		
		$cities = $cw_repo->get_cities();

		$this->layout->title = 'Register';

		$this->layout->nest('content', 'user.register', array('city'=>$city, 'state'=>$state, 'cities'=>$cities));
	}

	public function post_register()
	{
		$inputs = Input::get();

		$user_repo = IoC::resolve('user_repository');

		$success = $user_repo->add($inputs);

		if (!$success)
			return Redirect::to('/user/register'); //could also flash old input here
		else
		{
			$auth = Auth::attempt(array('username' => Input::get('email'), 'password' => Input::get('password')));
			return Redirect::to('/');
			//Ideally take user back to page they navigated from
		}
	}

	public function get_logout()
	{
		if (Auth::check())
			Auth::logout();

		return Redirect::to('/');
	}
}


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
		$inputs['admin'] = 0;

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

	public function get_home()
	{
		$this->layout->title = "Member Home";

		$user = Auth::user();

		$this->layout->nest('content', 'user.home', array('user'=>$user));
	}

	public function get_settings()
	{
		$this->layout->title = "Settings";

		$cw_repo = IoC::resolve('carwash_repository');
		
		$cities = $cw_repo->get_cities();

		//This uses Laravel's user model, which needs to be used cautiously
		//This model isn't directly controlled as the one from the repository is
		$user = Auth::user();

		$city = $user->city;
		$state = $user->state;

		$this->layout->nest('content', 'user.settings', array('user'=>$user, 'city'=>$city, 'state'=>$state, 'cities'=>$cities));
	}

	public function post_settings()
	{
		$inputs = Input::get();

		if (isset($inputs['password']) && $inputs['password'] == null)
			unset($inputs['password']);
		if (isset($inputs['first_name']))
			unset($inputs['first_name']);
		if (isset($inputs['last_name']))
			unset($inputs['last_name']);
		if (isset($inputs['admin']))
			unset($inputs['admin']);

		if (!isset($inputs['newsletter']))
			$inputs['newsletter'] = 0;

		$user_repo = IoC::resolve('user_repository');

		$success = $user_repo->edit(Auth::user()->id, $inputs);

		if (!$success)
			return Redirect::to('/'); //could also flash old input here
		else
			return Redirect::to('/user/settings');
	}

	public function get_logout()
	{
		if (Auth::check())
			Auth::logout();

		return Redirect::to('/');
	}
}


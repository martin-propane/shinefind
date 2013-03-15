<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/
Route::get('carwashes/(:all)', 'carwashes@index');
Route::get('products/(:all)', 'products@index');
Route::any('privacy', 'static@privacy');
Route::any('resources', 'static@resources');
Route::any('advertise', 'static@advertise');
Route::any('about', 'static@about');
Route::any('listing', 'static@listing');
Route::any('company', 'static@company');
Route::any('certification', 'static@certification');

Route::any('login', 'user@login');
Route::any('register', 'user@register');
Route::any('logout', 'user@logout');

//TODO: Manually add all controllers
Route::controller(Controller::detect());

Route::get('/', 'home@index');

Route::filter('pattern: admin/*', 'manager');

Route::filter('pattern: review/*', 'review');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::filter('manager', function()
{
	if (Auth::guest()) return Redirect::to('login');
	else if (Auth::user()->admin == 0) return Redirect::to('search/carwashes');
});

Route::filter('admin', function()
{
	if (Auth::guest()) return Redirect::to('login');
	else if (Auth::user()->admin === 0) return Redirect::to('search/carwashes');
	else if (Auth::user()->admin < 2) return Redirect::to('admin/panel');
});

Route::filter('review', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

View::composer('layouts.admin', function($view)
{
	$user = Auth::user();
	if ($user->admin >= 1)
		$view->nest('manager_menu', 'partials.manager_menu');
	if ($user->admin >= 2)
		$view->nest('admin_menu', 'partials.admin_menu');
    $view->nest('user', 'partials.userbar', array('user' => Auth::user()->email));
});

View::composer('layouts.frontend.basic', function($view)
{
	//Provide the city list for the city popup
	//This list might be something best cached in the repository, or only fetched if the user clicks change city
	$uri = URI::current();

	$cw_repo = IoC::resolve('carwash_repository');
	
	$view->cities = $cw_repo->get_cities();
	$view->current_city = Cookie::get('city');
	$view->current_state = Cookie::get('state');

	if ($uri === '/')
		$view->nest('iphone_app_link', 'partials.iphone_add_link');
	else
		$view->nest('iphone_app_link', 'partials.iphone_add_link2');
});

View::composer('partials.city_popup', function($view)
{
	$cw_repo = IoC::resolve('carwash_repository');
	
	$view->cities = $cw_repo->get_cities();
	$view->current_city = Cookie::get('city');
	$view->current_state = Cookie::get('state');
});


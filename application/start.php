<?php

/*
|--------------------------------------------------------------------------
| PHP Display Errors Configuration
|--------------------------------------------------------------------------
|
| Since Laravel intercepts and displays all errors with a detailed stack
| trace, we can turn off the display_errors ini directive. However, you
| may want to enable this option if you ever run into a dreaded white
| screen of death, as it can provide some clues.
|
*/

ini_set('display_errors', 'On');

/*
|--------------------------------------------------------------------------
| Laravel Configuration Loader
|--------------------------------------------------------------------------
|
| The Laravel configuration loader is responsible for returning an array
| of configuration options for a given bundle and file. By default, we
| use the files provided with Laravel; however, you are free to use
| your own storage mechanism for configuration arrays.
|
*/

Laravel\Event::listen(Laravel\Config::loader, function($bundle, $file)
{
	return Laravel\Config::file($bundle, $file);
});

/*
|--------------------------------------------------------------------------
| Register Class Aliases
|--------------------------------------------------------------------------
|
| Aliases allow you to use classes without always specifying their fully
| namespaced path. This is convenient for working with any library that
| makes a heavy use of namespace for class organization. Here we will
| simply register the configured class aliases.
|
*/

$aliases = Laravel\Config::get('application.aliases');

Laravel\Autoloader::$aliases = $aliases;

/*
|--------------------------------------------------------------------------
| Auto-Loader Mappings
|--------------------------------------------------------------------------
|
| Registering a mapping couldn't be easier. Just pass an array of class
| to path maps into the "map" function of Autoloader. Then, when you
| want to use that class, just use it. It's simple!
|
*/

Autoloader::map(array(
	'Base_Controller' => path('app').'controllers/base.php',
));

/*
|--------------------------------------------------------------------------
| Auto-Loader Directories
|--------------------------------------------------------------------------
|
| The Laravel auto-loader can search directories for files using the PSR-0
| naming convention. This convention basically organizes classes by using
| the class namespace to indicate the directory structure.
|
*/

Autoloader::directories(array(
	path('app').'models',
	path('app').'libraries',
	//path('app').'Shinefind',
));

Autoloader::namespaces(array(
    'Shinefind'   => path('app').'shinefind',
    'Extension'   => path('app').'libraries/'.'extension'
));


//Load Assets
Asset::add('jquery', 'js/jquery-1.8.3.min.js');
Asset::add('bootstrap', 'js/bootstrap.min.js');
Asset::add('bootstrap-css', 'css/bootstrap.min.css');

Asset::container('front-header')->add('960', 'css/960.css')->add('text', 'css/text.css')->add('reset', 'css/reset.css')->add('sf-main', 'css/shinefind_main.css')->add('jquery182', 'js/jquery-1.8.2.min.js')->add('shinefind-js', 'js/shinefind.js');

/*
|--------------------------------------------------------------------------
| Laravel View Loader
|--------------------------------------------------------------------------
|
| The Laravel view loader is responsible for returning the full file path
| for the given bundle and view. Of course, a default implementation is
| provided to load views according to typical Laravel conventions but
| you may change this to customize how your views are organized.
|
*/

Event::listen(View::loader, function($bundle, $view)
{
	return View::file($bundle, $view, Bundle::path($bundle).'views');
});

/*
|--------------------------------------------------------------------------
| Laravel Language Loader
|--------------------------------------------------------------------------
|
| The Laravel language loader is responsible for returning the array of
| language lines for a given bundle, language, and "file". A default
| implementation has been provided which uses the default language
| directories included with Laravel.
|
*/

Event::listen(Lang::loader, function($bundle, $language, $file)
{
	return Lang::file($bundle, $language, $file);
});

/*
|--------------------------------------------------------------------------
| Attach The Laravel Profiler
|--------------------------------------------------------------------------
|
| If the profiler is enabled, we will attach it to the Laravel events
| for both queries and logs. This allows the profiler to intercept
| any of the queries or logs performed by the application.
|
*/

if (Config::get('application.profiler'))
{
	Profiler::attach();
}

/*
|--------------------------------------------------------------------------
| Enable The Blade View Engine
|--------------------------------------------------------------------------
|
| The Blade view engine provides a clean, beautiful templating language
| for your application, including syntax for echoing data and all of
| the typical PHP control structures. We'll simply enable it here.
|
*/

Blade::sharpen();

/*
|--------------------------------------------------------------------------
| Set The Default Timezone
|--------------------------------------------------------------------------
|
| We need to set the default timezone for the application. This controls
| the timezone that will be used by any of the date methods and classes
| utilized by Laravel or your application. The timezone may be set in
| your application configuration file.
|
*/

date_default_timezone_set(Config::get('application.timezone'));

/*
|--------------------------------------------------------------------------
| Start / Load The User Session
|--------------------------------------------------------------------------
|
| Sessions allow the web, which is stateless, to simulate state. In other
| words, sessions allow you to store information about the current user
| and state of your application. Here we'll just fire up the session
| if a session driver has been configured.
|
*/

if ( ! Request::cli() and Config::get('session.driver') !== '')
{
	Session::load();
}


//IOC Registration
IoC::singleton('carwash_repository', function() {
	return new Shinefind\Repositories\Carwash_Repository();
});

IoC::singleton('association_repository', function() {
	return new Shinefind\Repositories\Association_Repository();
});

IoC::singleton('product_repository', function() {
	return new Shinefind\Repositories\Product_Repository();
});

IoC::singleton('user_repository', function() {
	return new Shinefind\Repositories\User_Repository();
});

IoC::singleton('carwash_review_repository', function() {
	return new Shinefind\Repositories\Carwash_Review_Repository();
});


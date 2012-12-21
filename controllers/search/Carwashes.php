<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Search_Carwashes_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.search';
	public $RESULTS_PER_PAGE = 4;

	public function get_index()
	{
		$cw_repo = IoC::resolve('carwash_repository');
		$carwashes = null;

		$this->layout->title = 'Search Carwashes';

		$city_str = Input::get('city');
		$city = trim(strstr($city_str, ',', true));
		$state = trim(substr($city_str, strpos($city_str, ',') + 1));

		$this->layout->city = $city;
		$this->layout->state = $state;

		$page = Input::get('page', 1);
		echo 'page: ' . $page;

		if ($city_str)
		{
			$carwashes = $cw_repo->get_city_paged($state, $city, $this->RESULTS_PER_PAGE, $page);
		}

		$this->layout->nest('results', 'Search.Carwashes.results', array('carwashes' => $carwashes, 'city' => $city, 'state' => $state, 'page' => $page));
	}

	public function post_index()
	{
		$this->layout->title = "Add Carwash";

		$cw_repo = IoC::resolve('carwash_repository');
		$res = $cw_repo->add(Input::all());

		return Redirect::to_action('Admin.Carwashes.view_all');

		if ($res === TRUE)
			return Response::make('Succesful submission!');
		else
			return Response::make($res);
	}
}

?>


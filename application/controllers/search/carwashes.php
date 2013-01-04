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
		$inputs = Input::get(); //Will be used by views to save information in current query

		$this->layout->title = 'Search Carwashes';

		$city_str = Input::get('city');
		$city = trim(strstr($city_str, ',', true));
		$state = trim(substr($city_str, strpos($city_str, ',') + 1));

		$this->layout->city = $city;
		$this->layout->state = $state;

		$page = Input::get('page', 1);
		$type = Input::get('type', 'all');

		$counts = array();
		$types = array('all', 'detailing', 'fullservice', 'tunnel', 'handwash', 'mobile', 'detailing');
		//if ($city_str)
		//{
			//get information for each type
			foreach ($types as $t)
				$counts[$t] = $cw_repo->get_city_count($state, $city, $t);

			$carwashes = $cw_repo->get_city_paged($state, $city, $type, $this->RESULTS_PER_PAGE, $page);
		//}

		$this->layout->nest('results', 'Search.Carwashes.results', array('carwashes' => $carwashes, 'city' => $city, 'state' => $state, 'page' => $page, 'type'=>$type, 'query'=>$inputs));
		$this->layout->nest('top_menu', 'Search.Carwashes.top_menu', array('query' => $inputs, 'type' => $type, 'counts' => $counts));
	}

	public function post_index()
	{
		$this->layout->title = "Add Carwash";

		$cw_repo = IoC::resolve('carwash_repository');
		$res = $cw_repo->add(Input::all());

		return Redirect::to_action('Admin.Carwashes.view');

		if ($res === TRUE)
			return Response::make('Succesful submission!');
		else
			return Response::make($res);
	}
}

?>


<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Search_Carwashes_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.frontend';
	public $RESULTS_PER_PAGE = 4;

	public function get_index()
	{
		$cw_repo = IoC::resolve('carwash_repository');
		$carwashes = null;
		$inputs = Input::get(); //Will be used by views to save information in current query

		$this->layout->title = 'Search Carwashes';

		$city = Cookie::get('city');
		$state = Cookie::get('state');
		$this->layout->nest('content', 'Search.Carwashes.index', array('city'=>$city, 'state'=>$state));

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

		$this->layout->content->nest('top_menu', 'Search.Carwashes.top_menu', array('query' => $inputs, 'type' => $type, 'counts' => $counts));
		$this->layout->content->nest('results', 'Search.Carwashes.results', array('carwashes' => $carwashes, 'city' => $city, 'state' => $state, 'page' => $page, 'type'=>$type, 'query'=>$inputs));
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


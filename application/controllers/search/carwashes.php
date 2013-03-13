<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Search_Carwashes_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.frontend.basic';
	public $RESULTS_PER_PAGE = 20;

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
		$sort = Input::get('sort', '');
		$order = Input::get('order', 'asc');

		$query = $cw_repo->query();

		$query->state_is($state);

		$query->city_is($city);

		$query->type_is($type);

		switch ($sort)
		{
			case 'alpha':
				$query->sort_name($order);
				break;
			case 'rating':
				$query->sort_rating($order);
				//Another query is needed if rated results want to be displayed before nonrated oens
				//$rating_query->state_is($state);
				//$rating_query->city_is($city);
				break;
			case 'certified':
				$query->sort_certified($order);
				break;
		}

		$counts = array();
		$types = array('all', 'detailing', 'fullservice', 'tunnel', 'handwash', 'mobile', 'detailing', 'freevacs', 'selfserve', 'softtouch', 'touchfree', 'xpress');

		//get information for each type
		foreach ($types as $t)
			$counts[$t] = $cw_repo->get_city_count($state, $city, $t);

		$count = $query->count();
		$carwashes = $query->page($this->RESULTS_PER_PAGE, $page-1);

		if ($page == 1)
		{
			$sponsor_query = $cw_repo->query();
			$sponsor_query->state_is($state);
			$sponsor_query->city_is($city);
			$sponsor_query->is_sponsored();
			$all_sponsors = $sponsor_query->get();
			shuffle($all_sponsors);

			$sponsored = array_slice($all_sponsors, 0, 4);
		}
		else
			$sponsored = null;

		$params['page'] = $page;
		$params['type'] = $type;
		$params['sort'] = $sort;
		$params['order'] = $order;

		$this->layout->content->nest('top_menu', 'Search.Carwashes.top_menu', array('query' => $params, 'type' => $type, 'counts' => $counts));
		$this->layout->content->nest('results', 'Search.Carwashes.results', array('carwashes' => $carwashes, 'sponsored'=>$sponsored, 'city' => $city, 'state' => $state, 'page' => $page, 'type'=>$type, 'query'=>$params, 'per_page'=>$this->RESULTS_PER_PAGE, 'count'=>$count));
	}
}

?>


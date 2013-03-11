<?php

use Shinefind\Repositories\Product_Repository;
use Shinefind\Entities\Product;

class Search_Products_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.frontend.basic';
	public $RESULTS_PER_PAGE = 4;

	public function get_index()
	{
		$p_repo = IoC::resolve('product_repository');
		$products = null;
		$inputs = Input::get(); //Will be used by views to save information in current query

		$this->layout->title = 'Search Products';

		$this->layout->nest('content', 'Search.Products.index');

		$page = Input::get('page', 1);
		$type = Input::get('type', 'all');
		$sort = Input::get('sort', '');
		$order = Input::get('order', 'asc');

		$query = $p_repo->query();

		switch ($sort)
		{
			case 'alpha':
				$query->sort_name($order);
				break;
			case 'ranking':
				$query->sort_ranking($order);
				break;
		}

		$counts = array();
		$types = array('all', 'wash', 'wax', 'trim', 'towels', 'leather', 'wheels');

		foreach ($types as $t)
			$counts[$t] = $p_repo->get_product_type_count($t);

		$count = $query->count();
		$products = $query->page($this->RESULTS_PER_PAGE, $page-1);

		$params['page'] = $page;
		$params['type'] = $type;
		$params['sort'] = $sort;
		$params['order'] = $order;

		$this->layout->content->nest('top_menu', 'Search.Products.top_menu', array('query' => $params, 'type' => $type, 'counts' => $counts));
		$this->layout->content->nest('results', 'Search.Products.results', array('products' => $products, 'page' => $page, 'type'=>$type, 'query'=>$params, 'per_page'=>$this->RESULTS_PER_PAGE, 'count'=>$count));
	}
}

?>


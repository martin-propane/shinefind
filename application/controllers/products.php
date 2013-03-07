<?php

use Shinefind\Services\Product_Review_Query;

class Products_Controller extends Base_Controller
{
	public$restful = true;
	public $layout = 'layouts.frontend.basic';

	public function get_index($id)
	{
		$per_page = 3;
		$sort = Input::get('sort', 'date');
		$order = Input::get('order', 'desc');
		$page = Input::get('page', '1');

		$p_repo = IoC::resolve('product_repository');
		
		$p = $p_repo->get($id);
		$query = new Product_Review_Query($id);
		
		switch ($sort)
		{
			case 'rating':
				$query->sort_rating($order);
				break;
			case 'date':
				$query->sort_timestamp($order);
				break;
		}
		
		$count = $query->count();
		$page_count = floor($count / $per_page);
		if ($count % $per_page)
			$page_count++;

		$reviews = $query->page($per_page, $page - 1);

		$params['sort'] = $sort;
		$params['order'] = $order;

		$this->layout->title = $p->name;
		$this->layout->nest('content', 'products.index', array('product'=>$p, 'reviews'=>$reviews, 'count'=>$count, 'pages'=>$page_count, 'query'=>$params, 'page'=>$page));
	}
}


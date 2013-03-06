<?php

use Shinefind\Services\Carwash_Review_Query;

class Carwashes_Controller extends Base_Controller
{
	public$restful = true;
	public $layout = 'layouts.frontend.basic';

	public function get_index($id)
	{
		$per_page = 3;
		$sort = Input::get('sort', 'date');
		$order = Input::get('order', 'desc');
		$page = Input::get('page', '1');

		$cw_repo = IoC::resolve('carwash_repository');
		
		$cw = $cw_repo->get($id);
		$query = new Carwash_Review_Query($id);
		
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

		$this->layout->title = $cw->name;
		$this->layout->nest('content', 'carwashes.index', array('carwash'=>$cw, 'reviews'=>$reviews, 'count'=>$count, 'pages'=>$page_count, 'query'=>$params, 'page'=>$page));
	}
}


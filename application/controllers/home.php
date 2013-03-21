<?php

use Shinefind\Services\Carwash_Review_Query;
use Shinefind\Services\Product_Review_Query;

class Home_Controller extends Base_Controller
{
	public$restful = true;
	public $layout = 'layouts.frontend.basic';


	public function get_index()
	{
		$this->layout->title = 'ShineFind';

		$city = Cookie::get('city');
		$state = Cookie::get('state');

		if ($city != null && $state != null)	
		{
			$cwr_query = new Carwash_Review_Query();
			$cwr_query->city_is($city);
			$cwr_query->state_is($state);
			$cwr_query->sort_timestamp('asc');
			$cw_reviews = $cwr_query->get();

			$pr_query = new Product_Review_Query();
			$pr_query->sort_timestamp('asc');
			$p_reviews = $pr_query->get();
			$reviews = $p_reviews + $cw_reviews;

			usort($reviews, function($a, $b) {
				return strtotime($b->timestamp) - strtotime($a->timestamp);
			});

			$reviews = array_slice($reviews, 0, 3);

			//TODO: CHANGE THIS. This is a hack to get carwash data to the homepage so it can display streetview images
			$cw_repo = IoC::resolve('carwash_repository');
			$p_repo = IoC::resolve('product_repository');
			foreach ($reviews as $review)
			{
				if (get_class($review) === 'Shinefind\Entities\Carwash_Review')
				{
					$id = $review->cw_id;
					$carwash = $cw_repo->get($id);
					$review->carwash = $carwash;
				}
				else
				{
					$id = $review->p_id;
					$product = $p_repo->get($id);
					$review->product = $product;
				}
			}
		}
		else
			$reviews = array();

		$this->layout->nest('content', 'home.index', array('current_city'=>$city, 'current_state'=>$state, 'reviews'=>$reviews));
	}

	public function post_city()
	{
		$old_city = Cookie::get('city');
		$old_state = Cookie::get('state');

		$new_city = Input::get('city');
		$new_state = Input::get('state');
		
		if ($new_city !== $old_city || $new_state !== $old_state)
		{
			Cookie::forever('city', $new_city);
			Cookie::forever('state', $new_state);
		}
		
		//now the reqiest should be redirected to the previous page
		//GET parameters are removed since the application state just changed
		$referrer = Request::referrer();
		$url = parse_url($referrer);
		$path = $url['path'];
		
		//this looks messy, but it seems to work for getting rid of the query string from a url
		if ($path === '/' || $path === '/home' || $path === '/index.php' || $path === '/index.php/home')
			return Redirect::to($url['scheme'] . '://' . $url['host'] . (isset($url['port']) ? ':'.$url['port'] : '') . $path);
		else
			return Redirect::to(URL::to('search/carwashes'));
	}
}


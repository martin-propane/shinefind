<?php

use Shinefind\Entities\Carwash_Review;
use Shinefind\Repositories\Carwash_Query;
use Shinefind\Entities\Product_Review;

class Review_Controller extends Base_Controller
{
	public $restful = true;
	public $layout = 'layouts.frontend.stuffed';


	public function get_index()
	{
		$this->layout->title = 'ShineFind';

		$current_city = Cookie::get('city');
		$current_state = Cookie::get('state');

		$this->layout->nest('content', 'review.index');
	}

	public function get_carwashes()
	{
		$this->layout->title = 'Review Carwashes';
		$city = Cookie::get('city');
		$state = Cookie::get('state');

		$cw_repo = IoC::resolve('carwash_repository');

		$query = $cw_repo->query();

		$query->state_is($state);
		$query->city_is($city);

		$carwashes = $query->get();
		//$carwashes = $query->get();

		$this->layout->nest('content', 'review.carwashes', array('carwashes'=>$carwashes));
	}

	public function get_carwash($id)
	{
		$this->layout->title = 'Review Carwash';
		$cw_repo = IoC::resolve('carwash_repository');

		$carwash = $cw_repo->get($id);

		$this->layout->nest('content', 'review.carwash', array('carwash'=>$carwash));
	}

	public function post_carwash($id)
	{
		$title = Input::get('title');
		$review = Input::get('review');
		$rating = Input::get('star');
		$cw_repo = IoC::resolve('carwash_repository');

		$carwash_review = new Carwash_Review(array('title'=>$title, 'review'=>$review, 'rating'=>$rating, 'cw_id'=>$id));

		if ($cw_repo->add_review($carwash_review))
		{
			return Redirect::to('carwashes/'.$id);
		}
		else
		{
			return Redirect::to('review/carwash/'.$id);
		}
	}

	public function get_products()
	{
		$this->layout->title = 'Review Products';

		$p_repo = IoC::resolve('product_repository');

		$query = $p_repo->query();

		$products = $query->get();

		$this->layout->nest('content', 'review.products', array('products'=>$products));
	}

	public function get_product($id)
	{
		$this->layout->title = 'Review Product';
		$p_repo = IoC::resolve('product_repository');

		$product = $p_repo->get($id);

		$this->layout->nest('content', 'review.product', array('product'=>$product));
	}

	public function post_product($id)
	{
		$title = Input::get('title');
		$review = Input::get('review');
		$rating = Input::get('star');
		$p_repo = IoC::resolve('product_repository');

		$product_review = new Product_Review(array('title'=>$title, 'review'=>$review, 'rating'=>$rating, 'p_id'=>$id));

		if ($p_repo->add_review($product_review))
		{
			return Redirect::to('products/'.$id);
		}
		else
		{
			return Redirect::to('review/product/'.$id);
		}
	}
}


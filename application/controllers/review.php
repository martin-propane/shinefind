<?php

use Shinefind\Entities\Carwash_Review;
use Shinefind\Repositories\Carwash_Query;

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
		$this->layout->title = 'Review Carwashes';
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

	public function get_products($id)
	{
		$this->layout->title = 'Review Products';
	}
}


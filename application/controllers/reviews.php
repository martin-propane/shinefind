<?php

use Shinefind\Entities\Carwash_Review;
use Shinefind\Repositories\Carwash_Query;
use Shinefind\Entities\Product_Review;

class Reviews_Controller extends Base_Controller
{
	public $restful = true;
	public $layout = 'layouts.frontend.basic';

	public function get_carwash($r_id)
	{
		$cw_repo = IoC::resolve('carwash_repository');
		$review = $cw_repo->get_review($r_id);
		$cw_id = $review->cw_id;

		$carwash = $cw_repo->get($cw_id);
		
		$this->layout->title = $carwash->name . ' Review';
		$this->layout->nest('content', 'reviews.carwash', array('review'=>$review, 'carwash'=>$carwash));
	}

	public function get_product($r_id)
	{
		$p_repo = IoC::resolve('product_repository');
		$review = $p_repo->get_review($r_id);
		$p_id = $review->p_id;

		$product = $p_repo->get($p_id);
		
		$this->layout->title = $product->name . ' Review';
		$this->layout->nest('content', 'reviews.product', array('review'=>$review, 'product'=>$product));
	}
}


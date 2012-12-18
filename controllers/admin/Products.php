<?php

use Shinefind\Repositories\Product_Repository;
use Shinefind\Entities\Product;

class Admin_Products_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.admin';

	public function get_add()
	{
		$this->layout->title = 'Add Product';
		$this->layout->nest('content', 'Admin.Product.add', array());
	}

	public function post_add()
	{
		$this->layout->title = "Add Product";

		$p_repo = IoC::resolve('product_repository');
		$res = $p_repo->add(Input::all());

		if ($res === TRUE)
			return Response::make('Succesful submission!');
		else
			return Response::make($res);
	}

	public function get_edit($id)
	{
		$this->layout->title = 'Edit Product';

		$p_repo = IoC::resolve('product_repository');

		$p = $p_repo->get($id);

		$arr = get_object_vars($p);
		$this->layout->nest('content', 'Admin.Products.edit', get_object_vars($p));
	}

	public function post_edit($id)
	{
		$p_repo = IoC::resolve('product_repository');

		$res = $p_repo->edit($id, Input::all());

		return Redirect::to_action('Admin.Products.view_all');
	}

	public function get_view_all()
	{
		$this->layout->title = 'Products';
	
		$p_repo = IoC::resolve('product_repository');
		$res = $p_repo->get_all();

		$this->layout->nest('content', 'Admin.Products.view_all', array('products' => $res));
	}
}

?>


<?php

use Shinefind\Repositories\Carwash_Repository;
use Shinefind\Entities\Carwash;

class Admin_Carwashes_Controller extends Base_Controller {
	
	public $restful = true;
	public $layout = 'layouts.admin';

	public function get_add()
	{
		$this->layout->title = 'Add Carwash';
		$this->layout->nest('content', 'Admin.Carwashes.add', array());
	}

	public function post_add()
	{
		$this->layout->title = "Add Carwash";

		$cw_repo = IoC::resolve('carwash_repository');
		$id = $cw_repo->add(Input::all());

		//TODO: MOVE THIS LOGIC OUT OF THE CONTROLLER, BAD
		$picture = Input::file('display_picture');
		if ($picture !== null)
		{
			$type_folder = path('public').'carwashes/';
			$entity_folder = $type_folder.$id.'/';
			$pic_path = $entity_folder.'display';
			if (!is_dir($type_folder))
				mkdir($type_folder);
			if (!is_dir($entity_folder))
				mkdir($entity_folder);

			move_uploaded_file($picture['tmp_name'], $pic_path);
		}

		return Redirect::to_action('Admin.Carwashes.view');
	}

	public function get_edit($id)
	{
		$this->layout->title = 'Edit Carwash';

		$cw_repo = IoC::resolve('carwash_repository');

		$cw = $cw_repo->get($id);

		$arr = get_object_vars($cw);
		$this->layout->nest('content', 'Admin.Carwashes.edit', get_object_vars($cw));
	}

	public function post_edit($id)
	{
		$cw_repo = IoC::resolve('carwash_repository');

		$res = $cw_repo->edit($id, Input::all());

		//TODO: MOVE THIS LOGIC OUT OF THE CONTROLLER, BAD
		$picture = Input::file('display_picture');
		if ($picture !== null)
		{
			$type_folder = path('public').'carwashes/';
			$entity_folder = $type_folder.$id.'/';
			$pic_path = $entity_folder.'display';
			if (!is_dir($type_folder))
				mkdir($type_folder);
			if (!is_dir($entity_folder))
				mkdir($entity_folder);

			move_uploaded_file($picture['tmp_name'], $pic_path);
		}

		return Redirect::to_action('Admin.Carwashes.view');
	}

	public function get_delete($id)
	{
		$this->layout->title = 'Delete Carwash';
		$cw_repo = IoC::resolve('carwash_repository');
		$cw_repo->delete($id);

		return Redirect::to_action('Admin.Carwashes.view');
	}

	public function get_view()
	{
		$per_page = 50;
		$this->layout->title = 'Carwashes';
		$input = Input::get();
		$name = Input::get('name');
		$state = Input::get('state', 'All');
		$city = Input::get('city');
		$phone = Input::get('phone');
		$sort = Input::get('sort', 'id');
		$order = Input::get('order', 'asc');
		$page = Input::get('page', '1');

		$cw_repo = IoC::resolve('carwash_repository');
		$query = $cw_repo->query();

		if ($state !== 'All')
			$query->state_is($state);

		if ($name != null)
			$query->name_like($name);
		
		if ($phone != null)
			$query->phone_like($phone);

		if ($city != null)
			$query->city_like($city);

		switch ($sort)
		{
			case 'id':
				$query->sort_id($order);
				break;
			case 'name':
				$query->sort_name($order);
				break;
			case 'busi_ad':
				$query->sort_busi_ad($order);
				break;
			case 'state':
				$query->sort_state($order);
				break;
			case 'city':
				$query->sort_city($order);
				break;
			case 'zip':
				$query->sort_zip($order);
				break;
			case 'phone':
				$query->sort_phone($order);
				break;
			case 'email':
				$query->sort_email($order);
				break;
			case 'website':
				$query->sort_website($order);
				break;
			case 'corp_ad':
				$query->sort_corp_ad($order);
				break;
		}

		$count = $query->count();
		$page_count = $count / $per_page;
		if ($count % $per_page)
			$page_count++;
		$carwashes = $query->page($per_page, $page - 1);
		
		//done so default values will be sent
		$input['name'] = $name;
		$input['state'] = $state;
		$input['city'] = $city;
		$input['phone'] = $phone;
		$input['sort'] = $sort;
		$input['order'] = $order;
		$input['page'] = $page;


		$this->layout->nest('content', 'Admin.Carwashes.view', array('carwashes' => $carwashes, 'params' => $input, 'count'=>$page_count));
	}
}

?>


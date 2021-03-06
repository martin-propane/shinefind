<?php

class Static_Controller extends Base_Controller
{
	public $restful = true;
	public $layout = 'layouts.frontend.static';

	public function get_company()
	{
		$this->layout->title = 'Company Info';

		$this->layout->nest('content', 'static.company');
	}

	public function get_privacy()
	{
		$this->layout->title = 'Privacy Policy';

		$this->layout->nest('content', 'static.privacy');
	}

	public function get_resources()
	{
		$this->layout->title = 'Resources';

		$this->layout->nest('content', 'static.resources');
	}

	public function get_listing()
	{
		$this->layout->title = 'Company Listings';

		$this->layout->nest('content', 'static.listing');
	}

	public function get_advertise()
	{
		$this->layout->title = 'Advertise';

		$this->layout->nest('content', 'static.advertise');
	}

	public function get_certification()
	{
		$this->layout->title = 'Certification';

		$this->layout->nest('content', 'static.certification');
	}

	public function get_about()
	{
		$this->layout->title = 'How it Works';

		$this->layout->nest('content', 'static.about');
	}
}


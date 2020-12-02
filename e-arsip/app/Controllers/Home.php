<?php

namespace App\Controllers;

use App\Models\Model_home;

class Home extends BaseController
{
	public function __construct()
	{

		$this->Model_home = new Model_home();
	}
	public function index()
	{
		$data = [
			'title' => 'Home',
			'tot_arsip' => $this->Model_home->tot_arsip(),
			'tot_kategori' => $this->Model_home->tot_kategori(),
			'tot_dep' => $this->Model_home->tot_dep(),
			'tot_user' => $this->Model_home->tot_user(),
			'tampil' => 'dashboard'
		];
		echo view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}

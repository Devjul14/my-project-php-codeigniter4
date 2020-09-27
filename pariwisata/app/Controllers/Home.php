<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'tampil' => 'dashboard'
		];
		echo view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}

<?php

namespace App\Controllers;

use App\Models\Model_dep;

class Dep extends BaseController
{
	public function __construct()
	{

		$this->Model_dep = new Model_dep();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'Department',
			'dep' => $this->Model_dep->all_data(),
			'tampil' => 'dep/index'
		];
		echo view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = array('nama_dep' => $this->request->getPost('nama_dep'));
		$this->Model_dep->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !');
		return redirect()->to(base_url('dep'));
	}

	public function edit($id_dep)
	{
		$data = array(
			'id_dep' => $id_dep,
			'nama_dep' => $this->request->getPost('nama_dep'),
		);
		$this->Model_dep->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Edit !');
		return redirect()->to(base_url('dep'));
	}

	public function delete($id_dep)
	{
		$data = array(
			'id_dep' => $id_dep,
		);
		$this->Model_dep->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus !');
		return redirect()->to(base_url('dep'));
	}



	//--------------------------------------------------------------------

}

<?php

namespace App\Controllers;

use App\Models\Model_kategori;

class Kategori extends BaseController
{
	public function __construct()
	{

		$this->Model_kategori = new Model_kategori();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'Kategori',
			'kategori' => $this->Model_kategori->all_data(),
			'tampil' => 'kategori/index'
		];
		echo view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = array('nama_kategori' => $this->request->getPost('nama_kategori'));
		$this->Model_kategori->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !');
		return redirect()->to(base_url('kategori'));
	}

	public function edit($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_kategori' => $this->request->getPost('nama_kategori'),
		);
		$this->Model_kategori->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Edit !');
		return redirect()->to(base_url('kategori'));
	}

	public function delete($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori,
		);
		$this->Model_kategori->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus !');
		return redirect()->to(base_url('kategori'));
	}



	//--------------------------------------------------------------------

}

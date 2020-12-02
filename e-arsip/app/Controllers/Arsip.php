<?php

namespace App\Controllers;

use App\Models\Model_arsip;
use App\Models\Model_kategori;

class Arsip extends BaseController
{
	public function __construct()
	{

		$this->Model_arsip = new Model_arsip();
		$this->Model_kategori = new Model_kategori();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'Arsip',
			'arsip' => $this->Model_arsip->all_data(),
			'tampil' => 'arsip/index'
		];
		echo view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => ' Add Arsip',
			'kategori' => $this->Model_kategori->all_data(),
			'tampil' => 'arsip/add'
		];
		echo view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'nama_arsip' => [
				'label'  => 'Nama Arsip',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],
			'deskripsi' => [
				'label'  => 'Deskripsi',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!',
				]
			],
			'file_arsip' => [
				'label'  => 'File Arsip',
				'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf,docx]',
				'errors' => [
					'uploaded' => ' {field} Wajib isi !!',
					'max_size' => ' Ukuran {field} Max 2048 KB !',
					'ext_in' => ' Format {field} Harus PDF,DOCX !'
				]
			]
		])) {
			// ambil file foto dr db
			$file_arsip = $this->request->getFile('file_arsip'); // folder foto
			//random nama file foto
			$nama_file = $file_arsip->getRandomName();
			//Jika Valid
			$data = array(
				'id_kategori' => $this->request->getPost('id_kategori'),
				'no_arsip' => $this->request->getPost('no_arsip'),
				'nama_arsip' => $this->request->getPost('nama_arsip'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'tgl_upload' => date('Y/m/d'),
				'tgl_update' => date('Y/m/d'),
				'id_dep' => session()->get('id_dep'),
				'id_user' => session()->get('id_user'),
				'file_arsip' => $nama_file,
			);
			$file_arsip->move('file_arsip', $nama_file);

			$this->Model_arsip->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Tambah !');
			return redirect()->to(base_url('arsip'));
		} else {
			//Jika Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('arsip/add'));
		}
	}

	public function edit($id_arsip)
	{
		$data = [
			'title' => ' Edit Arsip',
			'kategori' => $this->Model_kategori->all_data(),
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'tampil' => 'arsip/edit'
		];
		echo view('layout/wrapper', $data);
	}


	public function update($id_arsip)
	{
		if ($this->validate([
			'nama_arsip' => [
				'label'  => 'Nama Arsip',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],
			'deskripsi' => [
				'label'  => 'Deskripsi',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!',
				]
			],
			'file_arsip' => [
				'label'  => 'File Arsip',
				'rules'  => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf,docx]',
				'errors' => [

					'max_size' => ' Ukuran {field} Max 2048 KB !',
					'ext_in' => ' Format {field} Harus PDF,DOCX !'
				]
			]
		])) {
			$file_arsip = $this->request->getFile('file_arsip'); // folder file_arsip
			if ($file_arsip->getError() == 4) {
				$data = array(
					'id_arsip' => $id_arsip,
					'id_kategori' => $this->request->getPost('id_kategori'),
					'no_arsip' => $this->request->getPost('no_arsip'),
					'nama_arsip' => $this->request->getPost('nama_arsip'),
					'deskripsi' => $this->request->getPost('deskripsi'),
					'tgl_update' => date('Y/m/d'),
					'id_dep' => session()->get('id_dep'),
					'id_user' => session()->get('id_user'),
				);
				$this->Model_arsip->edit($data);
			} else {
				$nama_file = $file_arsip->getRandomName();
				$data = array(
					'id_arsip' => $id_arsip,
					'id_kategori' => $this->request->getPost('id_kategori'),
					'no_arsip' => $this->request->getPost('no_arsip'),
					'nama_arsip' => $this->request->getPost('nama_arsip'),
					'deskripsi' => $this->request->getPost('deskripsi'),
					'tgl_upload' => date('Y/m/d'),
					'tgl_update' => date('Y/m/d'),
					'id_dep' => session()->get('id_dep'),
					'id_user' => session()->get('id_user'),
				);
				$file_arsip->move('file_arsip', $nama_file);

				$this->Model_arsip->edit($data);
			}


			session()->setFlashdata('pesan', 'Data Berhasil di Update !');
			return redirect()->to(base_url('arsip'));
		} else {
			//Jika Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('arsip/edit/' . $id_arsip));
		}
	}

	public function delete($id_arsip)
	{

		$data = array(
			'id_arsip' => $id_arsip,
		);
		$this->Model_arsip->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus !');
		return redirect()->to(base_url('arsip'));
	}

	public function viewpdf($id_arsip)
	{
		$data = [
			'title' => 'View Arsip',
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'tampil' => 'arsip/viewpdf'
		];
		echo view('layout/wrapper', $data);
	}
}
			




	//--------------------------------------------------------------------

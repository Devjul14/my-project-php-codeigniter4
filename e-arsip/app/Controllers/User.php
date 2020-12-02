<?php

namespace App\Controllers;

use App\Models\Model_user;
use App\Models\Model_dep;


class User extends BaseController
{
	public function __construct()
	{

		$this->Model_user = new Model_user();
		$this->Model_dep = new Model_dep();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title' => 'User',
			'user' => $this->Model_user->all_data(),
			'tampil' => 'user/index'
		];
		echo view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Add User',
			'dep' => $this->Model_dep->all_data(),
			'tampil' => 'user/add'
		];
		echo view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'nama_user' => [
				'label'  => 'Nama User',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],
			'email' => [
				'label'  => 'E-Mail',
				'rules'  => 'required|is_unique[tbl_user.email]',
				'errors' => [
					'required' => ' {field} Wajib isi !!',
					'is_unique' => ' {field} Sudah Terdaftar !!'
				]
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'min_length' => ' {field} Wajib isi !!'
				]
			],
			'level' => [
				'label'  => 'Level',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],
			'id_dep' => [
				'label'  => 'Department',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],
			'foto' => [
				'label'  => 'Foto',
				'rules'  => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
				'errors' => [
					'uploaded' => ' {field} Wajib isi !!',
					'max_size' => ' Ukuran {field} Max 1024 KB !',
					'mime_in' => ' Format {field} Harus PNG,JPG,JPEG !'
				]
			]
		])) {
			// ambil file foto dr db
			$foto = $this->request->getFile('foto'); // folder foto
			//random nama file foto
			$nama_foto = $foto->getRandomName();
			//Jika Valid
			$data = array(
				'nama_user' => $this->request->getPost('nama_user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'level' => $this->request->getPost('level'),
				'id_dep' => $this->request->getPost('id_dep'),
				'foto' => $nama_foto,
			);
			$foto->move('foto', $nama_foto);

			$this->Model_user->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Tambah !');
			return redirect()->to(base_url('user'));
		} else {
			//Jika Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user/add'));
		}
	}

	public function edit($id_user)
	{
		$data = [
			'title' => 'Edit User',
			'dep' => $this->Model_dep->all_data(),
			'user' => $this->Model_user->detail_data($id_user),
			'tampil' => 'user/edit'
		];
		echo view('layout/wrapper', $data);
	}

	public function update($id_user)
	{
		if ($this->validate([
			'nama_user' => [
				'label'  => 'Nama User',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],

			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'min_length' => ' {field} Wajib isi !!'
				]
			],
			'level' => [
				'label'  => 'Level',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],
			'id_dep' => [
				'label'  => 'Department',
				'rules'  => 'required',
				'errors' => [
					'required' => ' {field} Wajib isi !!'
				]
			],
			'foto' => [
				'label'  => 'Foto',
				'rules'  => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => ' Ukuran {field} Max 1024 KB !',
					'mime_in' => ' Format {field} Harus PNG,JPG,JPEG !'
				]
			]
		])) {
			$foto = $this->request->getFile('foto'); // folder foto
			if ($foto->getError() == 4) {
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					'password' => $this->request->getPost('password'),
					'level' => $this->request->getPost('level'),
					'id_dep' => $this->request->getPost('id_dep'),
					//'foto' => $nama_foto,
				);
				//$foto->move('foto', $nama_foto);
				$this->Model_user->edit($data);
			} else {
				$nama_foto = $foto->getRandomName();
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					'password' => $this->request->getPost('password'),
					'level' => $this->request->getPost('level'),
					'id_dep' => $this->request->getPost('id_dep'),
					'foto' => $nama_foto,
				);
				$foto->move('foto', $nama_foto);
				$this->Model_user->edit($data);
			}


			session()->setFlashdata('pesan', 'Data Berhasil di Update !');
			return redirect()->to(base_url('user'));
		} else {
			//Jika Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user/edit/' . $id_user));
		}
	}
	public function delete($id_user)
	{

		$data = array(
			'id_user' => $id_user,
		);
		$this->Model_user->hapus($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus !');
		return redirect()->to(base_url('user'));
	}

	//--------------------------------------------------------------------

}

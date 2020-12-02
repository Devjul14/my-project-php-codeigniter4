<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelWisata;
use App\Models\ModelKategori;
use Config\Services;

class Wisata extends Controller
{

    protected $modelWisata;


    public function __construct()
    {
        $this->modelWisata = new ModelWisata();
        helper('form');
        helper('file');
    }

    public function index()
    {

        $data = [
            'title' => 'Wisata',
            'tampil' => 'wisata/index',
            'wisata' => $this->modelWisata->getWisata()
        ];
        echo view('layout/wrapper', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Wisata',
            'tampil' => 'wisata/detail',
            'wisata' => $this->modelWisata->getWisata($id)
        ];
        echo view('layout/wrapper', $data);
    }


    public function add()
    {
        $data = [
            'title' => 'Tambah Wisata',
            'tampil' => 'wisata/form'
        ];
        echo view('layout/wrapper', $data);
    }

    // public function save()
    // {
    //     $this->modelWisata->saveWisata([
    //         'nama_wisata' => $this->request->getVar('nama_wisata'),
    //         'kota' => $this->request->getVar('kota'),
    //         'nama_kategori' => $this->request->getVar('nama_kategori'),
    //         'tiket' => $this->request->getVar('tiket'),
    //         // 'photo' => $getPhoto,
    //         'deskripsi' => $this->request->getVar('deskripsi')
    //     ]);

    //     return redirect()->to('/wisata');
    // }

    public function save()
    {
        $model = new ModelWisata();
        if ($_FILES['photo']['name'] != "") {
            $photo = $this->request->getFile('photo');
            $photo->move(ROOTPATH . 'public/uploads');
            $getPhoto = $photo->getName();
        } else {
            $getPhoto = NULL;
        }

        $data = array(
            'nama_wisata' => $this->request->getPost('nama_wisata'),
            'kota' => $this->request->getPost('kota'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'tiket' => $this->request->getPost('tiket'),
            // 'photo' => $getPhoto,
            'deskripsi' => $this->request->getPost('deskripsi'),

        );
        $model->saveWisata($data);
        session()->setFlashData('success', 'Data is saved successfully!');
        return redirect()->to('/wisata');
    }

    public function edit($id)
    {
        $model = new ModelWisata();
        $modelCat = new ModelKategori();
        $data['kategori'] = $modelCat->getKategori();
        $data['wisata'] = $model->getWisata($id)->getRow();
        $data['urlmethod'] = $this->modul . '/update';
        $data['arr'] = 'Edit';
        $data['title'] = 'Form Wisata';
        Services::template('wisata/form', $data);
    }


    public function update()
    {
        $model = new ModelWisata();
        $id = $this->request->getPost('id_wisata');
        $cek = $model->where('id_wisata', $id)->first();
        if ($_FILES['photo']['name'] != "") {
            $photo = $this->request->getFile('photo');
            unlink(ROOTPATH . 'public/uploads/' . $cek["photo"]);
            $photo->move(ROOTPATH . 'public/uploads');
            $getPhoto = $photo->getName();
        } else {
            $getPhoto = $cek["photo"];
        }

        $value = '';
        $data = array(
            'nama_wisata' => $this->request->getPost('nama_wisata'),
            'kota' => $this->request->getPost('kota'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'tiket' => $this->request->getPost('tiket'),
            'photo' => $getPhoto,
            'deskripsi' => $this->request->getPost('deskripsi'),
        );
        $model->updateWisata($data, $id);
        session()->setFlashData('success', 'Data is updated successfully!');
        return redirect()->to('/wisata');
    }

    public function delete($id)
    {
        $model =  new ModelWisata();
        $cek = $model->where('id_wisata', $id)->first();
        if ($cek["photo"] != NULL) {
            unlink(ROOTPATH . 'public/uploads/' . $cek["photo"]);
        }
        $model->deleteWisata($id);
        session()->setFlashData('success', 'Data is deleted successfully!');
        return redirect()->to('/wisata');
    }
}

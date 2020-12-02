<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelLokasi;
use Config\Services;

class Lokasi extends Controller
{
    protected $modul = "lokasi";

    public function index()
    {
        $model = new ModelLokasi();
        $data['lokasi'] =  $model->getLokasi();
        $data['title'] = 'Lokasi List';
        $data['tampil'] = 'lokasi/index';
        echo view('layout/wrapper', $data);
    }

    public function add()
    {
        $data['urlmethod'] = $this->modul . '/save';
        $data['title'] = 'Lokasi List';
        $data['tampil'] = 'lokasi/form';
        echo view('layout/wrapper', $data);
    }

    public function save()
    {
        $model = new ModelLokasi();
        $data = array(
            'lat' => $this->request->getPost('lat'),
            'long' => $this->request->getPost('long'),
            'jalan' => $this->request->getPost('jalan'),
            'kota' => $this->request->getPost('kota'),
            'negara' => $this->request->getPost('negara')
        );
        $model->saveLokasi($data);
        session()->setFlashData('success', 'Data is saved successfully!');
        return redirect()->to('/lokasi');
    }

    public function edit($id)
    {
        $model = new ModelLokasi();
        $data['lokasi'] = $model->getLokasi($id)->getRow();
        $data['urlmethod'] = $this->modul . '/update';
        $data['title'] = 'Lokasi Edit';
        $data['tampil'] = 'lokasi/form';
        echo view('layout/wrapper', $data);
    }


    public function view($id)
    {
        $model = new ModelLokasi();
        $data['category'] = $model->getLokasi($id)->getRow();
        $data['tampil'] = 'lokasi/form';
        $data['urlmethod'] = $this->modul;
        $data['v'] = "";
        $data['title'] = 'Lokasi Detail';
        echo view('layout/wrapper', $data);
    }

    public function update()
    {
        $model = new ModelLokasi();
        $id = $this->request->getPost('id');
        $data = array(
            'lat' => $this->request->getPost('lat'),
            'long' => $this->request->getPost('long'),
            'jalan' => $this->request->getPost('jalan'),
            'kota' => $this->request->getPost('kota'),
            'negara' => $this->request->getPost('negara')
        );
        $model->updateLokasi($data, $id);
        session()->setFlashData('success', 'Data is updated successfully!');
        return redirect()->to('/lokasi');
    }

    public function delete($id)
    {

        try {
            $model =  new ModelLokasi();
            $model->deleteLokasi($id);
        } catch (\Throwable $th) {
            //throw $th;
            session()->setFlashData('error', 'Something wrongs because ' . $th->getMessage());
            return redirect()->to('/lokasi');
        }

        return redirect()->to('/lokasi');
    }
}

<?php

namespace App\Controllers;

use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\RESTful\ResourceController;

class ApiKategori extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\ModelKategori';

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $name = $this->request->getPost('nama_kategori');

        $data = [
            'nama_kategori' => $name,

        ];
        if ($validation->run($data, 'kategori') == FALSE) {
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->saveKategori($data);
            if ($simpan) {
                $msg = ["message" => "Berhasil disimpan"];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg
                ];
                return $this->respond($response, 200);
            }
        }
    }


    public function show($id = NULL)
    {
        $get = $this->model->getKategori($id)->getRowArray();
        if ($get) {
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get
            ];
        } else {
            $code = 404;
            $response = [
                'status' => $code,
                'error' => true,
                'data' => ['message' => 'Not Found']
            ];
        }
        return $this->respond($response, $code);
    }

    public function edit($id = NULL)
    {
        $get = $this->model->getKategori($id)->getRowArray();

        if ($get) {
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get
            ];
        } else {
            $code = 404;
            $response = [
                'status' => $code,
                'error' => true,
                'data' => ['message' => 'Not Found']
            ];
        }
        return $this->respond($response, $code);
    }




    public function update($id = NULL)
    {
        $validation = \Config\Services::validation();

        $data = $this->request->getRawInput();
        if ($validation->run($data, 'kategori') == FALSE) {

            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors()
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateKategori($data, $id);
            if ($simpan) {
                $msg = ['message' => 'Data berhasil diupdate'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg
                ];
                return $this->respond($response, 200);
            }
        }
    }


    public function delete($id = NULL)
    {
        $hapus = $this->model->deleteKategori($id);
        if ($hapus) {
            $code = 200;
            $msg = ['message' => 'Deleted category successfully'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg
            ];
        }
        return $this->respond($response);
    }
}

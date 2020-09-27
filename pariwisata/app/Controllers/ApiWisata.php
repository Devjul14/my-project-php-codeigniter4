<?php

namespace App\Controllers;

use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\RESTful\ResourceController;

class ApiWisata extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\ModelWisata';

    public function index()
    {

        return $this->respond($this->model->getWisata(), 200);
    }

    public function create()
    {

        $validation = \Config\Services::validation();
        $nama_wisata = $this->request->getPost('nama_wisata');
        $kota = $this->request->getPost('kota');
        $nama_kategori = $this->request->getPost('nama_kategori');
        $tiket = $this->request->getPost('tiket');
        $deskripsi = $this->request->getPost('deskripsi');
        $photo = $this->request->getFile('photo');
        $id_wisata = $this->request->getPost('id_wisata');

        if (!$id_wisata) {

            if ($photo != NULL) {
                $photo->move(ROOTPATH . 'public/uploads');
                $getPhoto = $photo->getName();
            } else {
                $getPhoto = NULL;
            }


            $data = [
                'nama_wisata' => $nama_wisata,
                'kota' => $kota,
                'nama_kategori' => $nama_kategori,
                'tiket' => $tiket,
                'deskripsi' => $deskripsi,
                'photo' => $getPhoto
            ];
            if ($validation->run($data, 'wisata') == FALSE) {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'data' => $validation->getErrors(),
                ];
                return $this->respond($response, 500);
            } else {
                $simpan = $this->model->saveWisata($data);
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
        } else {

            $cek = $this->model->where('id_wisata', $id_wisata)->first();

            if ($photo != NULL) {
                unlink(ROOTPATH . 'public/uploads/' . $cek["photo"]);
                $photo->move(ROOTPATH . 'public/uploads');
                $getPhoto = $photo->getName();
            } else {
                $getPhoto = $cek["photo"];
            }

            $data = [
                'nama_wisata' => $nama_wisata,
                'kota' => $kota,
                'nama_kategori' => $nama_kategori,
                'tiket' => $tiket,
                'deskripsi' => $deskripsi,
                'photo' => $getPhoto
            ];

            if ($validation->run($data, 'wisata') == FALSE) {

                $response = [
                    'status' => 500,
                    'error' => true,
                    'data' => $validation->getErrors()
                ];
                return $this->respond($response, 500);
            } else {
                $simpan = $this->model->updateWisata($data, $id_wisata);
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
    }


    public function show($id_wisata = NULL)
    {
        $get = $this->model->getWisata($id_wisata)->getRowArray();
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

    public function edit($id_wisata = NULL)
    {
        $get = $this->model->getWisata($id_wisata)->getRowArray();

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




    public function update($id_wisata = NULL)
    {
        helper(['form', 'array', 'text']);

        $validation = \Config\Services::validation();
        var_dump($_REQUEST);
        die();
        $nama_wisata = $this->request->getPost('nama_wisata');
        $kota = $this->request->getPost('kota');
        $nama_kategori = $this->request->getPost('nama_kategori');
        $tiket = $this->request->getPost('tiket');
        $deskripsi = $this->request->getPost('deskripsi');
        var_dump($this->request->getRawInput());
        die();
        $cek = $this->model->where('id_wisata', $id_wisata)->first();
        $photo = $this->request->getFile('photo');

        if ($photo != NULL) {
            unlink(ROOTPATH . 'public/uploads/' . $cek["photo"]);
            $photo->move(ROOTPATH . 'public/uploads');
            $getPhoto = $photo->getName();
        } else {
            $getPhoto = $cek["photo"];
        }

        $data = [
            'nama_wisata' => $nama_wisata,
            'kota' => $kota,
            'nama_kategori' => $nama_kategori,
            'tiket' => $tiket,
            'deskripsi' => $deskripsi,
            'photo' => $getPhoto
        ];

        if ($validation->run($data, 'wisata') == FALSE) {

            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors()
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateWisata($data, $id_wisata);
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


    public function delete($id_wisata = NULL)
    {
        $hapus = $this->model->deleteWisata($id_wisata);
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

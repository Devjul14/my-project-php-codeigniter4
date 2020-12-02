<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelWisata;
use App\Models\ModelKategori;
use Config\Services;

class Kategori extends Controller
{

    protected $modelKategori;


    public function __construct()
    {
        $this->modelKategori = new ModelKategori();
        helper('form');
        helper('file');
    }

    public function index()
    {

        $kategori = $this->modelKategori->getKategori();
        $data = [
            'title' => 'Kategori',
            'tampil' => 'kategori/index',
            'kategori' => $kategori
        ];
        echo view('layout/wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'tampil' => 'kategori/form'
        ];
        echo view('layout/wrapper', $data);
    }

    public function save()
    {
        $this->modelKategori->saveKategori([
            'nama_kategori' => $this->request->getVar('nama_kategori')

        ]);

        return redirect()->to('/kategori');
    }
}

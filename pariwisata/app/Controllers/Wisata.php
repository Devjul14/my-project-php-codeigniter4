<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelWisata;
// use App\Models\ModelKategori;

class Wisata extends Controller
{
    public function index()
    {
        $model = new ModelWisata();
        $data['wisata'] = $model->getWisata();
        return view('wisata/index', $data);
	}
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWisata extends Model
{

    protected $table = "wisata";
    // protected $primaryKey = 'id_wisata';
    // protected $allowedFields = ['nama_wisata', 'id_lokasi', 'id_kategori', 'tiket', 'deskripsi', 'photo'];

    public function getWisata($id = false)
    {
        if ($id == false) {
            return $this->db->table('wisata')
                ->join('lokasi', 'lokasi.id_lokasi=wisata.id_lokasi')
                ->join('kategori', 'kategori.id_kategori=wisata.id_kategori')
                ->get()->getResultArray();
        } else {
            return $this->getWhere(['id_wisata' => $id])->getRowArray();
        }
    }

    public function saveWisata($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateWisata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_wisata' => $id]);
    }
    public function deleteWisata($id)
    {
        return $this->db->table($this->table)->delete(['id_wisata' => $id]);
    }
}

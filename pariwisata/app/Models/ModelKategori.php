<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = "kategori";

    public function getKategori($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kategori' => $id]);
        }
    }

    public function saveKategori($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateKategori($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id_kategori' => $id]);
        return $query;
    }

    public function deleteKategori($id)
    {
        $query = $this->db->table($this->table)->delete(['id_kategori' => $id]);
        return $query;
    }
}

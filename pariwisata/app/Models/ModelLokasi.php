<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    protected $table = "lokasi";

    public function getLokasi($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_lokasi' => $id]);
        }
    }

    public function saveLokasi($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateLokasi($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id_lokasi' => $id]);
        return $query;
    }

    public function deleteLokasi($id)
    {
        $query = $this->db->table($this->table)->delete(['id_lokasi' => $id]);
        return $query;
    }
}

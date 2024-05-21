<?php

namespace App\Models;

use CodeIgniter\Model;

class Prodi_model extends Model
{
    protected $table = 'prodi';

    public function getProdi($id = false)
    {
        $this->join('fakultas', 'fakultas.fak_id = prodi.fak_id');

        if ($id === false) {
            return $this->get()->getResultArray();
        } else {
            return $this->where('prodi.prodi_id', $id)->get()->getRowArray();
        }
    }
    public function insertProdi($data)
    {
    return $this->db->table($this->table)->insert($data);
    }
}

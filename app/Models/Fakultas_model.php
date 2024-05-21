<?php

namespace App\Models;

use CodeIgniter\Model;

class Fakultas_model extends Model
{
    protected $table = 'fakultas';

    public function getFakultas($id = false)
    {
        if ($id === false) {
            // Jika $id tidak diberikan, kembalikan semua data fakultas
            return $this->findAll();
        } else {
            // Jika $id diberikan, kembalikan data fakultas dengan ID tersebut
            return $this->getWhere(['fak_id' => $id]);
        }
    }
    public function insertFakultas($data)
    {
        return $this->db->table($this->table)->insert($data);
    }   
    public function deleteFakultas($id)
    {
        return $this->db->table($this->table)->delete(['fak_id' => $id]);
    }
    public function updateFakultas($data, $id)
    {
            return $this->db->table($this->table)->update($data, ['fak_id' => $id]);
    }

}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Dashboard_model extends Model
{
    protected $table = 'fakultas';

    public function getCountFak()
    {
        return $this->db->table($this->table)->countAll();
    }

    public function getCountProdi()
    {
        return $this->db->table('prodi')->countAll();
    }

    public function getCountDosen()
    {
        return $this->db->table('dosen')->countAll();
    }

    public function getCountMhs()
    {
        return $this->db->table('mahasiswa')->countAll();
    }
}

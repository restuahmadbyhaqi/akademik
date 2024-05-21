<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa_model extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'mhs_id';
    protected $allowedFields = ['mhs_nama', 'prodi_id', 'mhs_npm'];

    protected $validationRules = [
        'mhs_nama' => 'required|max_length[100]', // Misalnya maksimal 100 karakter
        'prodi_id' => 'required',
        'mhs_npm' => 'required|is_unique[mahasiswa.mhs_npm,mhs_id,{mhs_id}]'
        // Aturan validasi lainnya di sini
    ];
    

    protected $validationMessages = [
        'mhs_nama' => [
            'required' => 'Nama mahasiswa wajib diisi.'
        ],
        'prodi_id' => [
            'required' => 'Prodi mahasiswa wajib diisi.'
        ],
        'mhs_npm' => [
            'required' => 'NPM mahasiswa wajib diisi.',
            'is_unique' => 'NPM mahasiswa harus unik.'
        ],
        // Pesan kesalahan untuk aturan validasi lainnya
    ];

    public function getMahasiswa($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function getProdi()
    {
        // Implementasi untuk mendapatkan daftar program studi
        // Sesuaikan dengan kebutuhan aplikasi Anda
        return $this->db->table('prodi')->get()->getResultArray();
    }

    public function insertMahasiswa($data)
    {
        return $this->insert($data);
    }

    public function updateMahasiswa($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteMahasiswa($id)
    {
        return $this->delete($id);
    }
}

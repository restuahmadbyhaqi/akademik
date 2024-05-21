<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Prodi_model;
use App\Models\Fakultas_model;

class Prodi extends Controller
{
    protected $helpers = [];
    protected $FakultasModel;
    protected $ProdiModel;

    public function __construct()
    {
        helper(['form']);
        $this->FakultasModel = new Fakultas_model(); // Sesuaikan dengan nama model Anda
        $this->ProdiModel = new Prodi_model(); // Sesuaikan dengan nama model Anda
    }

    public function index()
    {
        $paginate = 2;
        $data['dataprodi'] = $this->ProdiModel->getProdi(); // Ubah $Prodi_model menjadi $ProdiModel
        return view('Prodi/index', $data);
    }

    public function create()
    {
        $fakultas = $this->FakultasModel->where('fak_status','Active')->findAll();
        $data['fakultas'] = ['' => 'Pilih Fakultas'] + array_column($fakultas, 'fak_nama', 'fak_id');
        return view('Prodi/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $data = [
            'fak_id' => $this->request->getPost('fak_id'),
            'prodi_nama' => $this->request->getPost('prodi_nama'),
            'prodi_akre' => $this->request->getPost('prodi_akre'),
            'prodi_jenj' => $this->request->getPost('prodi_jenj'),
            'prodi_status' => $this->request->getPost('prodi_status'),
        ];

        if($validation->run($data, 'prodi') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('Prodi/create'));
        } else {
            $simpan = $this->ProdiModel->insertProdi($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created Prodi successfully');
                return redirect()->to(base_url('Prodi'));
            } else {
                session()->setFlashdata('error', 'Failed to create Prodi');
                return redirect()->to(base_url('Prodi/create'));
            }
        }
    }
        public function show($id)
    {
        $data['showprodi'] = $this->ProdiModel->getProdi($id); // Pastikan metode getProdi mengembalikan deskripsi prodi
        echo view('prodi/show', $data);
    }


}

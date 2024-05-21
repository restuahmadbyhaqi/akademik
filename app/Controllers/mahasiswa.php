<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mahasiswa_model;

class Mahasiswa extends Controller
{
    public function index()
    {
        $model = new Mahasiswa_model();
        $data['mahasiswa'] = $model->getMahasiswa();
        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        $model = new Mahasiswa_model();
        $data['data_prodi'] = $model->getProdi();
        return view('mahasiswa/create', $data);
    }

    public function store()
    {
        $model = new Mahasiswa_model();
        $validation = \Config\Services::validation();

        $data = [
            'mhs_nama' => $this->request->getPost('mhs_nama'),
            'prodi_id' => $this->request->getPost('prodi_id'),
            'mhs_npm' => $this->request->getPost('mhs_npm')
        ];

        if (!$validation->run($data, 'mahasiswa')) {
            session()->setFlashdata('errors', $validation->getErrors());
            session()->setFlashdata('inputs', $this->request->getPost());
            return redirect()->to(base_url('mahasiswa/create'));
        } else {
            $model->insertMahasiswa($data);
            session()->setFlashdata('success', 'Data mahasiswa berhasil ditambahkan');
            return redirect()->to(base_url('mahasiswa'));
        }
    }

    public function edit($id)
    {
        $model = new Mahasiswa_model();
        $data['mahasiswa'] = $model->getMahasiswa($id);
        $data['data_prodi'] = $model->getProdi();
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $model = new Mahasiswa_model();
        $validation = \Config\Services::validation();

        $data = [
            'mhs_nama' => $this->request->getPost('mhs_nama'),
            'prodi_id' => $this->request->getPost('prodi_id'),
            'mhs_npm' => $this->request->getPost('mhs_npm')
        ];

        if (!$validation->run($data, 'mahasiswa')) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('mahasiswa/edit/' . $id));
        } else {
            $model->updateMahasiswa($id, $data);
            session()->setFlashdata('info', 'Updated Mahasiswa successfully');
            return redirect()->to(base_url('mahasiswa'));
        }
    }

    public function delete($id)
    {
        $model = new Mahasiswa_model();
        $model->deleteMahasiswa($id);
        session()->setFlashdata('warning', 'Deleted Mahasiswa successfully');
        return redirect()->to(base_url('mahasiswa'));
    }
}

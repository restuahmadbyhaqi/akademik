<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Fakultas_model;

class Fakultas extends Controller
{
    public function index()
    {
        $model = new Fakultas_model();
        $data['fakultas'] = $model->getFakultas();

        return view('fakultas/index', $data);
    }

    public function create()
    {
        return view('fakultas/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $data = [
            'fak_nama' => $this->request->getPost('fak_nama'),
            'fak_jmlprodi' => $this->request->getPost('fak_jmlprodi'),
            'fak_lokasi' => $this->request->getPost('fak_lokasi'),
        ];

        if ($validation->run($data, 'fakultas') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->to(base_url('fakultas/create'));
        } else {
            $model = new Fakultas_model();
            $simpan = $model->insertfakultas($data);

            if ($simpan) {
                session()->setFlashdata('success', 'Created fakultas successfully');
                return redirect()->to(base_url('fakultas'));
            }
        }
    }

    public function edit($id)
    {
        if (!is_numeric($id)) {
            return redirect()->to(base_url('fakultas'));
        }

        $model = new Fakultas_model();
        $data['fakultas'] = $model->getFakultas($id)->getRowArray();

        echo view('fakultas/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('fak_id');
        $validation = \Config\Services::validation();

        $data = [
            'fak_nama' => $this->request->getPost('fak_nama'),
            'fak_jmlprodi' => $this->request->getPost('fak_jmlprodi'),
            'fak_lokasi' => $this->request->getPost('fak_lokasi'),
        ];

        if ($validation->run($data, 'fakultas') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->to(base_url("fakultas/edit/{$id}"));
        } else {
            $model = new Fakultas_model();
            $ubah = $model->updateFakultas($data, $id);

            if ($ubah) {
                session()->setFlashdata('info', 'Updated Fakultas successfully');
                return redirect()->to(base_url('fakultas'));
            }
        }
    }

    public function delete($id)
    {
        $model = new Fakultas_model();
        $hapus = $model->deleteFakultas($id);

        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Fakultas successfully');
            return redirect()->to(base_url('fakultas'));
        }
    }
}


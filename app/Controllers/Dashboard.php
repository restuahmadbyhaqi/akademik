<?php

namespace App\Controllers;

use App\Models\Dashboard_model;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->dashboard_model = new Dashboard_model();
        $this->cek_login(); // Jika validasi login diperlukan di setiap metode di controller ini
    }

    public function index()
    {
        $data['total_fakultas'] = $this->dashboard_model->getCountFak();
        $data['total_prodi'] = $this->dashboard_model->getCountProdi();
        $data['total_dosen'] = $this->dashboard_model->getCountDosen();
        $data['total_mahasiswa'] = $this->dashboard_model->getCountMhs();

        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }

        echo view('dashboard', $data);
        echo view('_partials/footer');
    }
}



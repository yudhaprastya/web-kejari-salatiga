<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananPengambilanBarangBuktiModel;
use App\Models\PengaduanModel;

class Layanan extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "title" => "Layanan"
        ];
    }

    public function barangBukti()
    {
        $this->data['subtitle'] = "Pengambilan Barang Bukti";

        $model = new LayananPengambilanBarangBuktiModel();
        $this->data['items'] = $model->findAll();

        return view('admin/layanan/barangBuktiView', $this->data);
    }

    public function pengaduan()
    {
        $this->data['subtitle'] = "Pengaduan Masyarakat";

        $model = new PengaduanModel();
        $this->data['items'] = $model->findAll();

        return view('admin/layanan/pengaduan', $this->data);
    }

    public function kunjunganTahanan()
    {
        $this->data['subtitle'] = "Kunjungan Tahanan";

        $model = new PengaduanModel();
        $this->data['items'] = $model->findAll();

        return view('admin/layanan/kunjungan_tahanan', $this->data);
    }
}

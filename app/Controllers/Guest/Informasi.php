<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\BidangModel;
use App\Models\JadwalSidangModel;

class Informasi extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "base" => "Informasi"
        ];
    }

    public function index()
    {
        
    }

    public function jadwalSidang()
    {
        $jadwalSidangModel = new JadwalSidangModel();

        $pidum = $jadwalSidangModel->where('kategori', 'pidum')->orderBy('tanggal', 'desc')->limit(10)->findAll();
        $pidsus = $jadwalSidangModel->where('kategori', 'pidsus')->orderBy('tanggal', 'desc')->limit(10)->findAll();

        $this->data["pidum"] = $pidum;
        $this->data["pidsus"] = $pidsus;

        return view('guest/informasi/jadwal_sidang_view', $this->data);
    }

    public function renstra() {
        return view('guest/informasi/renstra', $this->data);
    }

    public function renja() {
        return view('guest/informasi/renja', $this->data);
    }
    
    public function perjanjianKerja() {
        return view('guest/informasi/perjanjian_kerja', $this->data);
    }

    public function laporanKinerja() {
        return view('guest/informasi/laporan_kinerja', $this->data);
    }
}

<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\BidangModel;

class Bidang extends BaseController
{
    protected $data;
    protected $model;

    public function __construct()
    {
        $this->data = [
            "base" => "Bidang"
        ];
        $this->model = new BidangModel();
    }

    public function index()
    {
        
    }

    public function detail($slug)
    {
        $bidang = $this->model->where('slug', $slug)->first();
        if (!$bidang) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Bidang $slug tidak ditemukan.");
        }

        $bidang['fungsi'] = explode(';', $bidang['fungsi']);
        $bidang['struktural'] = explode(';', $bidang['struktural']);
        $bidang['kepala'] = 'Kepala Seksi';
        if ($bidang['slug'] == 'pembinaan') {
            $bidang['kepala'] = 'Kepala Sub Bagian';
        }
        $this->data['bidang'] = $bidang;
        return view('guest/bidang', $this->data);
    }
}

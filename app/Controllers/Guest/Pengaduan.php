<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    protected $data;
    protected $model;

    public function __construct()
    {
        $this->data = [
            "base" => "Pengaduan"
        ];
        $this->model = new PengaduanModel();
    }

    public function index()
    {
        return view('guest/layanan/pengaduan', $this->data);   
    }

    public function store()
    {
        $rules = [
            'nama' => 'required|min_length[3]',
            'alamat' => 'required|min_length[5]',
            'nik' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'email' => 'valid_email',
            'kronologi' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nik' => $this->request->getPost('nik'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'kronologi' => $this->request->getPost('kronologi'),
            'identitas' => "",
            'bukti' => "",
            'status' => 'pending',
        ];

        $bukti_file = $this->request->getFile('bukti_dukung');
        $bukti = upload_file($bukti_file, ['jpg', 'jpeg', 'png', 'pdf'], 10, "/pengaduan/bukti");
        if (!$bukti['success']) {
            dd("foto bukti gagal diupload: " . $bukti['errors']);
            return redirect()->back()->withInput()->with("errors", $bukti['errors']);
        } else {
            $data['bukti'] = $bukti['data'];
        }

        $identitas_file = $this->request->getFiles()['identitas'];
        if (count($identitas_file) == 0 || count($identitas_file) > 5) {
            return redirect()->back()->withInput()->with('errors', 'Harap upload identitas diri pelapor/pelaku, dan maksimal 5 file.');
        }

        foreach ($identitas_file as $file) {
            $identitas = upload_file($file, ['jpg', 'jpeg', 'png', 'pdf'], 2, "/pengaduan/identitas");

            if (!$identitas['success']) {
                dd("foto identitas gagal diupload: " . $identitas['errors']);
                return redirect()->back()->withInput()->with("errors", $identitas['errors']);
            } else {
                $data['identitas'] = $data['identitas'] . $identitas['data'] . ";";
            }
        }
        

        if ($this->model->insert($data)) {
            session()->setFlashdata('success_create', 'Pengaduan berhasil dibuat.');
        } else {
            session()->setFlashdata('errors', 'Gagal membuat pengaduan.');
        }

        return redirect()->to('/layanan/pengaduan');
    }
}

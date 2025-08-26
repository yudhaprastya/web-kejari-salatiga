<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;
use App\Models\LayananModel;

class BukuTamu extends BaseController
{
    protected $data;
    protected $model;
    protected $layananModel;

    public function __construct()
    {
        $this->data = [
            "title" => "Buku Tamu"
        ];
        $this->model = new BukuTamuModel();
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        $page = (int) ($this->request->getVar('page') ?? 1);
        $limit = (int) ($this->request->getVar('limit') ?? 5);
        $offset = ($page - 1) * $limit;

        $this->data['tamus'] = $this->model->orderBy("tanggal", "desc")->orderBy("nomor", "asc")->findAll($limit, $offset);
        $this->data['layanans'] = $this->layananModel->find();

        $this->data['total'] = $this->model->countAll();
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;

        return view('admin/buku_tamu', $this->data);
    }

    public function store()
    {
        $rules = [
            'tanggal'          => 'required',
            'nama_petugas'     => 'required',
            'tipe_pelayanan'   => 'required',
            'tipe_identitas'   => 'required',
            'nomor_identitas'  => 'required',
            'nama'             => 'required',
            'jenis_kelamin'    => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal'          => $this->request->getPost('tanggal'),
            'nama_petugas'     => $this->request->getPost('nama_petugas'),
            'layanan_id'       => $this->request->getPost('tipe_pelayanan'),
            'nama'             => $this->request->getPost('nama'),
            'tipe_identitas'   => $this->request->getPost('tipe_identitas'),
            'nomor_identitas'  => $this->request->getPost('nomor_identitas'),
            'no_hp'            => $this->request->getPost('no_hp'),
            'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'     => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'    => $this->request->getPost('tanggal_lahir'),
            'plat_kendaraan'   => $this->request->getPost('plat'),
            'alamat'           => $this->request->getPost('alamat'),
            'nomor'            => $this->model->getLastNumberForToday() + 1,
            'status'           => "waiting",
            'foto_diri'        => ""
        ];

        $base64 = $this->request->getPost('photo_base64');
        $saveDir = FCPATH . 'uploads/tamu';

        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0755, true);
        }

        if ($base64) {
            if (!preg_match('#^data:(image/(png|jpeg|jpg));base64,(.+)$#i', $base64, $m)) {
                return redirect()->back()->with('errors', ['Invalid image data.']);
            }

            $mime = strtolower($m[1]);
            $raw  = base64_decode($m[3], true);
            if ($raw === false) {
                return redirect()->back()->with('errors', ['Bad base64 payload.']);
            }

            if (strlen($raw) > 4 * 1024 * 1024) {
                return redirect()->back()->with('errors', ['Image too large (max 4 MB).']);
            }

            $ext = ($mime === 'image/png') ? 'png' : 'jpg';
            $newName = rand(1000, 9999) . '_tamu_' . date('Y-m-d') . '_' . $this->request->getPost('tipe_pelayanan') .'.' . $ext;
            $fullPath = $saveDir . DIRECTORY_SEPARATOR . $newName;
            if (file_put_contents($fullPath, $raw) !== false) {
                $data['foto_diri'] = $newName;
            }
        }

        if ($this->model->insert($data)) {
            return redirect()->back()->with('success', 'Data tamu berhasil ditambahkan.');
        }
        
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id)
    {
        $model = new BukuTamuModel();
        $model->delete($id);
        return redirect()->back()->with('success', 'Data tamu berhasil dihapus.');
    }

    public function showAntrian()
    {
        $curr = $this->model->where('status', 'called')->where('tanggal', date('Y-m-d'))->first();
        if (!$curr) {
            $curr = $this->model->where('status', 'waiting')->where('tanggal', date('Y-m-d'))->orderBy('nomor', 'ASC')->first();
        }
        $this->data = [
            'current' => $curr,
            'queue'   => $this->model->getTodayQueue(),
        ];
        return view('guest/antrian', $this->data);
    }

    public function next($id)
    {
        if ($this->model->update($id, ["status" => "called"])) {
            return redirect()->back()->with("success", "Data tamu berhasil diupdate");
        }

        return redirect()->back()->with("errors", "Gagal memanggil tamu");
    }

    public function done($id)
    {
        if ($this->model->update($id, ["status" => "done"])) {
            return redirect()->back()->with("success", "Data tamu berhasil diupdate");
        }

        return redirect()->back()->with("errors", "Gagal memyelesaikan pelayanan");
    }

    public function pulse()
    {
        $curr = $this->model->where('status', 'called')->where('tanggal', date('Y-m-d'))->first();
        if (!$curr) {
            $curr = $this->model->where('status', 'waiting')->where('tanggal', date('Y-m-d'))->orderBy('nomor', 'ASC')->first();
        }
        return $this->response->setJSON([
            'nomor'  => $curr ? (int)$curr['nomor'] : null,
            'ts'     => time(),
            'queue'   => $this->model->getTodayQueue(),
        ])->setStatusCode(\CodeIgniter\HTTP\ResponseInterface::HTTP_OK);
    }
}

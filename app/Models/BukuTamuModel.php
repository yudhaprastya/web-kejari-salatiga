<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuTamuModel extends Model
{
    protected $table            = 'buku_tamu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'layanan_id',
        'nama_petugas',
        'nama',
        'tipe_identitas',
        'nomor_identitas',
        'jenis_kelamin',
        'tanggal',
        'alamat',
        'no_hp',
        'foto_diri',
        'foto_identitas',
        'tanggal_lahir',
        'tempat_lahir',
        'plat_kendaraan',
        'nomor',
        'status',
        'created_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTodayQueue()
    {
        return $this->where('tanggal', date('Y-m-d'))
                    ->orderBy('nomor', 'ASC')
                    ->findAll();
    }

    public function getNextWaiting()
    {
        return $this->where('tanggal', date('Y-m-d'))
                    ->where('status', 'waiting')
                    ->orderBy('nomor', 'ASC')
                    ->first();
    }

    public function callNext()
    {
        $current = $this->where('tanggal', date('Y-m-d'))
                        ->where('status', 'called')
                        ->first();
        if ($current) {
            $this->update($current['id'], ['status' => 'done']);
        }
        $next = $this->getNextWaiting();
        if ($next) {
            $this->update($next['id'], ['status' => 'called']);
        }
        return $next;
    }

    public function getLastNumberForToday(): int
    {
        $row = $this->where('tanggal', date('Y-m-d'))
                    ->orderBy('nomor', 'DESC')
                    ->first();

        return (int)($row['nomor'] ?? 0);
    }

    public function lastIdToday(): int
    {
        $row = $this->select('MAX(id) AS last_id')
                    ->where('tanggal', date('Y-m-d'))
                    ->first();
        return (int)($row['last_id'] ?? 0);
    }

    public function countToday(): int
    {
        $row = $this->select('COUNT(*) AS c')
                    ->where('tanggal', date('Y-m-d'))
                    ->first();
        return (int)($row['c'] ?? 0);
    }
}

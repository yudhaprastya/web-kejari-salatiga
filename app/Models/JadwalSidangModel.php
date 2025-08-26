<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalSidangModel extends Model
{
    protected $table            = 'jadwal_sidang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'tanggal',
        'terdakwa',
        'jpu',
        'no_perkara',
        'agenda',
        'kategori',
        'tempat',
        'created_at'
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

     public function getWithJaksa(int $limit = 10, int $offset = 0)
    {
        $sidangList = $this->orderBy('tanggal', 'DESC')
            ->limit($limit, $offset)
            ->findAll();

        if (empty($sidangList)) {
            return ['data' => [], 'total' => 0];
        }

        $total = $this->countAll();

        $sidangIds = array_column($sidangList, 'id');

        $sidangJaksaModel = new \App\Models\JaksaSidangModel();
        $jaksaMap = $sidangJaksaModel->getJaksaSidangBySidangIds($sidangIds);

        foreach ($sidangList as &$sidang) {
            $sidang['jaksa_list'] = $jaksaMap[$sidang['id']] ?? [];
        }

        return [
            'data' => $sidangList,
            'total' => $total
        ];
    }
}

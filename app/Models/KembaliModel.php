<?php

namespace App\Models;

use CodeIgniter\Model;

class KembaliModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kembali';
    protected $primaryKey       = 'kd_buku';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_buku', 'nm_buku', 'kembali', 'nis', 'kategori'];

    public function getKembali($kd_buku)
    {
        return $this->where('kd_buku', $kd_buku)->first();
    }
}
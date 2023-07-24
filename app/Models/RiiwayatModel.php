<?php

namespace App\Models;

use CodeIgniter\Model;

class RiiwayatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = ['kembali', 'pinjam'];
    protected $primaryKey       = 'kd_buku';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_buku', 'nm_buku', 'pinjam', 'kembali', 'nis', 'kategori'];

}
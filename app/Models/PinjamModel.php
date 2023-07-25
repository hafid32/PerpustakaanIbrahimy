<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pinjam';
    protected $primaryKey       = 'kd_buku';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_buku', 'nm_buku', 'pinjam', 'nis', 'kategori'];
}
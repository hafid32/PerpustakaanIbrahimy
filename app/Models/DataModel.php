<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data';
    protected $primaryKey       = 'kd_buku';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_buku', 'nm_buku', 'riwayat', 'kondisi', 'kategori'];

}
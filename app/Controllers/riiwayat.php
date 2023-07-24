<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RiiwayatModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
class Riiwayat extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new RiiwayatModel();

        $this->menu = [
                'beranda' =>[
                    'title' => 'Beranda',
                    'link' => base_url(),
                    'icon' => 'fa-solid fa-house',
                    'aktif' => '',
                ],
                'data' =>[
                    'title' => 'Data Buku',
                    'link' => base_url() . 'data',
                    'icon' => 'fa-solid fa-book',
                    'aktif' => '',
                ],
                'pinjam' =>[
                    'title' => 'Buku Pinjam',
                    'link' => base_url() . 'pinjam',
                    'icon' => 'fa-solid fa-handshake',
                    'aktif' => '',
                ],
                'kembali' =>[
                    'title' => 'Buku Kembali',
                    'link' => base_url() . 'kembali',
                    'icon' => 'fa-solid fa-right-to-bracket',
                    'aktif' => '',
                ],
                'riiwayat' =>[
                    'title' => 'Riiwayat Buku',
                    'link' => base_url() . 'riiwayat',
                    'icon' => 'fa-solid fa-calendar-days',
                    'aktif' => 'active',
                ],
            ];
    } 
    
    public function index()
    {    
    $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Data Buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Data Buku</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data Buku";
        
        $query = $this->pm->find();
        $data['data_buku'] = $query;
        return view('data/content', $data);
    }
}
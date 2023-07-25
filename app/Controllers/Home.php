<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' =>[
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => 'active',
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
            'PostController' =>[
                'title' => 'Riwayat Buku',
                'link' => base_url() . 'PostController',
                'icon' => 'fa-solid fa-calendar-days',
                'aktif' => '',
            ],
        ];
        
        $breadcrumb = ' <div class="col-sm-6">
                            <h1 class="m-0">PERPUSTAKAAN IBRAHIMY</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data = [];
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "بسم الله الرحمن الرحيم";
        $data['selamat_datang'] = "SELAMAT DATANG DI PERPUSTAKAAN IBRAHIMY";
        return view('template/content', $data);
    }

    
}

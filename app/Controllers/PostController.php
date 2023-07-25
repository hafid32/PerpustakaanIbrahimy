<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KembaliModel;
use App\Models\PinjamModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
class PostController extends BaseController
{
    public function index()
    {
        // Mengambil daftar pinjam dari model PinjamModel
        $PinjamModel = new PinjamModel();
        $data_pinjam = $PinjamModel->findAll();

        // Menampilkan daftar pinjam menggunakan view
        return view('post/index', ['data_pinjam' => $data_pinjam]);
    }

    public function show($postId)
    {
        // Mengambil data post berdasarkan ID dari model PinjamModel
        $PinjamModel = new PinjamModel();
        $post = $PinjamModel->find($postId);

        // Jika post ditemukan, cari data Kembali yang berelasi dengannya
        if ($post) {
            $KembaliModel = new KembaliModel();
            $Kembali = $KembaliModel->getKembali($post['kd_buku']);

            // Tampilkan detail post dan Kembali menggunakan view
            return view('post/detail', ['post' => $post, 'Kembali' => $Kembali]);
        } else {
            // Tampilkan pesan jika post tidak ditemukan
            return 'Post not found';
        }
    }
}

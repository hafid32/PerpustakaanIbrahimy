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
        $PinjamModel = new PinjamModel();
        $data_pinjam = $PinjamModel->findAll();

        return view('post/index', ['data_pinjam' => $data_pinjam]);
    }

    public function show($postId)
    {
        $PinjamModel = new PinjamModel();
        $post = $PinjamModel->find($postId);


        if ($post) {
            $KembaliModel = new KembaliModel();
            $Kembali = $KembaliModel->getKembali($post['kd_buku']);

            return view('post/detail', ['post' => $post, 'Kembali' => $Kembali]);
        } else {
            return 'Post not found';
        }
    }
}

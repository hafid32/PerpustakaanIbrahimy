<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KembaliModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class kembali extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new KembaliModel();

        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => '',
            ],
            'data' => [
                'title' => 'Data Buku',
                'link' => base_url() . 'data',
                'icon' => 'fa-solid fa-book',
                'aktif' => '',
            ],
            'pinjam' => [
                'title' => 'Buku pinjam',
                'link' => base_url() . 'pinjam',
                'icon' => 'fa-solid fa-handshake',
                'aktif' => '',
            ],
            'kembali' => [
                'title' => 'Buku Kembali',
                'link' => base_url() . 'kembali',
                'icon' => 'fa-solid fa-right-to-bracket',
                'aktif' => 'active',
            ],
            'riiwayat' => [
                'title' => 'Riwayat Buku',
                'link' => base_url() . 'riiwayat',
                'icon' => 'fa-solid fa-calendar-days',
                'aktif' => '',
            ],
        ];
        $this->rules = [
            'kd_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kode buku tidak boleh kosong',
                ]
            ],
            'nm_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama buku tidak boleh kosong',
                ]
            ],
            'kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pengembali tidak boleh kosong',
                ]
            ],
            'nis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Induk Santri tidak boleh kosong',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori tidak boleh kosong',
                ]
            ],
        ];
    }

    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Data kembali</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Data kembali</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data kembali";

        $query = $this->pm->find();
        $data['data_kembali'] = $query;
        return view('kembali/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">kembali</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/kembali">Data kembali</a></li>
                            <li class="breadcrumb-item active">Tambah kembali</li>
                        </ol>
                    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah kembali';
        $data['action'] = base_url() . '/kembali/simpan';
        return view('kembali/input', $data);
    }

    public function simpan()
    {

        if (strtolower($this->request->getMethod()) !== 'post') {

            return redirect()->back()->withInput();
        }

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }


        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('kembali')->with('success', 'Data Insya Allah aman tersimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'hapus data gagal dilakukan');
        }

        try {
            $this->pm->delete($id);
            return redirect()->to('kembali')->with('success', 'Data Buku dengan kode' . $id . ' berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('kembali')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/kembali">Data Buku</a></li>
                            <li class="breadcrumb-item active">Edit Buku</li>
                        </ol>
                    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'edit Buku';
        $data['action'] = base_url() . '/kembali/update';

        $data['edit_kembali'] = $this->pm->find($id);
        return view('kembali/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['']);

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }

        if (empty($dtEdit[''])) {
            unset($dtEdit['']);
        }

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('kembali')->with('success', 'Alhamdulillah Sudah di Update');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}

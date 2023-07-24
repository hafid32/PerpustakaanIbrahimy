<?php
if (!isset($_GET['page'])) {
?>
    <div class="card">
        <div class="card-header">
            Perpustakaan Ibrahimy
        </div>
        <div class="card-body">
            <h5 class="fa-card-title">Selamat Datang Di Peminjaman BUku di Perpustakaan</h5>
            <p class="card-text">Silahkan Klik Menu Di atas, Untuk Mengelolah konten.</p>
        </div>
    </div>
<?php
}
if (!isset($_GET['page'])) {
    $page = $_GET['page'];
    $rootFolder = 'app/';
    $ext = ".php";
    if (!isset($_GET['act'])) {
        $end_point = '/list_';
        include $rootFolder . $page . $end_point . $page . $ext; // app/prodi/list_prodi.php;
    } else {
        $act = $_GET['act'];
        if ($act == 'input' || $act == 'edit') {
            $end_point = '/form_';
            include $rootFolder . $page . $end_point . $page . $ext; // app/prodi/form_prodi.php
        } else if ($act == 'save' || $act == 'update' || $act == 'hapus') {
            $end_point = '/controller_';
            include $rootFolder . $page . $end_point . $page . $ext; // app/prodi/controller_prodi.php
        }
    }
} else {
    $page = $_GET['page'];
    $rootFolder = 'app/';
    $ext = ".php";
    if (!isset($_GET['act'])) {
        $end_point = '/list_';
        include $rootFolder . $page . $end_point . $page . $ext; // app/kembali/list_kembali.php
    } else {
        $act = $_GET['act'];
        if ($act == 'input' || $act == 'edit') {
            $end_point = '/form_';
            include $rootFolder . $page . $end_point . $page . $ext; // app/kembali/form_kembali.php
        } else if ($act == 'save' || $act == 'update' || $act == 'hapus') {
            $end_point = '/controller_';
            include $rootFolder . $page . $end_point . $page . $ext; // app/kembali/controller_kembali.php
        }
    }
}

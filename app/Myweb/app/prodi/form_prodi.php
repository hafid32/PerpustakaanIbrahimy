<?php
$act = isset($_GET['act']) ? $_GET['act'] : false;
$kode = isset($_GET['kd_prodi']) ? $_GET['kd_prodi'] : false;

if ($act == 'edit') {
    $url = base_url() . "index.php?page=prodi&act=update";
    if ($kode) {
        $query = $db->query("SELECT * FROM prodi WHERE kd_prodi = '$kode'");
        $row = $query->fetch_array();
    } else {
        echo "<script>
                    alert( 'Parameter Kode prodi Tidak Valid');
                    window.location.href='" . base_url() . "index.php?page=prodi';
                    </script>";
    }
} else {
    $url = base_url() . "index.php?page=prodi&act=save";
}
?>

<br>
<div class="card">
    <div class="card-header">
        PEMINJAMAN BUKU DI PERPUSTAKAAN IBRAHIMY
    </div>
    <div class="card-body">
        <form action="<?php echo $url; ?>" method="post">
            <input type="hidden" name="kd_prodi_old" id="kd_prodi_old"
                value="<?php echo isset($row) ? $row['kd_prodi'] : ''; ?>">
            <div class="md-3">
                <label for="kd_prodi">Kode Buku</label>
                <input class="form-control" name="kd_prodi" id="kd_prodi"
                    value="<?php echo isset($row) ? $row['kd_prodi'] : ''; ?>">
            </div>
            <div class="md-3">
                <label for="nama_prodi">Peminjam</label>
                <input class="form-control" name="nama_prodi" id="nama_prodi"
                    value="<?php echo isset($row) ? $row['nama_prodi'] : ''; ?>">
            </div>
            <div class="md-3">
                <label for="kd_fakultas">Tanggal</label>
                <input class="form-control" name="kd_fakultas" id="kd_fakultas"
                    value="<?php echo isset($row) ? $row['kd_fakultas'] : ''; ?>">
            </div>
            <div class="md-3">
                <label for="password">ID Petugas</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="md-3">
                </Button>
                <a class="btn btn-danger btn-sm float-start" href="list_prodi.php">
                    <i class="fa-solid fa-chevron-left"></i>
                    Kembali
                </a>
                <button class="btn btn-primary btn-sm float-end" type="submit">
                    <i class="fa-regular fa-floppy-disk"></i>
                    Simpan Data
                </button>

            </div>
        </form>
    </div>
</div>
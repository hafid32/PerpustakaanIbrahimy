<?php

$act = $_GET['act'];

if ($act == 'save') {
    $kd_prodi = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $kd_fakultas = $_POST['kd_fakultas'];
    $password = sha1($_POST['password']);

    $query = $db->query("INSERT INTO kembali (kd_prodi, nama_prodi, kd_fakultas, password)
                    VALUES ('$kd_prodi','$nama_prodi','$kd_fakultas','$password')");
    if ($query) {
        echo "<script>
                        alert( 'Data Sukses Disimpan');
                        window.location.href= '" . base_url() . "index.php?page=kembali';
                        </script>";
    } else {

        echo "<script>
        alert( 'Data Gagal Disimpan');
        window.location.href= '" . base_url() . "index.php?page=kembali&act=input';
        </script>";
    }
} else if ($act == 'update') {
    $kd_prodi_old = $_POST['kd_prodi_old'];
    $kd_prodi = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $kd_fakultas = $_POST['kd_fakultas'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $password_fix = sha1($password);
        $query = $db->query("UPDATE kembali SET kd_prodi = '$kd_prodi'
                                            nama_prodi = '$nama_prodi',
                                            kd_fakultas = '$kd_fakultas',
                                            password = '$password_fix'
                                        WHERE kd_prodi='$kd_prodi_old' ");
    } else {
        $query = $db->query("UPDATE kembali SET kd_prodi = '$kd_prodi',
                                            nama_prodi = '$nama_prodi',
                                            kd_fakultas = '$kd_fakultas'
                                        WHERE kd_prodi='$kd_prodi_old' ");
    }
    if ($query) {
        echo "<script>
                        alert( 'Data Sukses Diubah');
                        window.location.href=  '" . base_url() . "index.php?page=kembali';
                        </script>";
    } else {
        echo "<script>
                        alert( 'Data Gagal Diubah');
                        window.location.href=  '" . base_url() . "index.php?page=kembali';
                        </script>";
    }
} else if ($act == 'hapus') {
    $kd_prodi = $_GET['kd_prodi'];
    $query = $db->query("DELETE FROM kembali WHERE kd_prodi = '$kd_prodi'");
    if ($query) {
        echo "<script>
                        alert( 'Data Sukses Dihapus');
                        window.location.href=  '" . base_url() . "index.php?page=kembali';
                        </script>";
    } else {
        echo "<script>
                        alert( 'Data Gagal Dihapus');
                        window.location.href=  '" . base_url() . "index.php?page=kembali';
                        </script>";
    }
} else {
    echo "<script>
    alert( 'Maaf, Parameter Anda Tidak Valid');
    window.location.href=  '" . base_url() . "index.php?page=kembali';
    </script>";
}
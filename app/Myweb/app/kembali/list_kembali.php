<div class="card">
    <div class="card-header">
        PENGEMBALIAN BUKU DI PERPUSTAKAAN IBRAHIMY
    </div>
    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'index.php?page=kembali&act=input'; ?>">
            <i class="fa-solid fa-circle-plus"></i> Tambah Data</a>
        <?php
        $query = $db->query("SELECT * FROM kembali;");
        ?>
        <table class="table table-striped">
    </div>
</div>

<thead>
    <tr>
        <th>NO.</th>
        <th>Kode Buku</th>
        <th>Pengembali</th>
        <th>Tanggal</th>
        <th>Act</th>
    </tr>
</thead>
<tbody>
    <?php
    $no = 1;
    while ($row = $query->fetch_array()) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['kd_prodi']; ?></td>
        <td><?php echo $row['nama_prodi']; ?></td>
        <td><?php echo $row['kd_fakultas']; ?></td>
        <td><a class="btn btn-outline-success btn-sm"
                href=" <?php echo base_url(); ?>index.php?page=kembali&act=edit&kd_prodi=<?php echo $row['kd_prodi']; ?>"><i
                    class="fa-solid fa-pen-to-square"></i></a>
            <a class="btn btn-outline-danger btn-sm"
                href=" <?php echo base_url(); ?>index.php?page=kembali&act=hapus&kd_prodi=<?php echo $row['kd_prodi']; ?>"><i
                    class="fa-solid fa-trash-can"></i></a>
        </td>
    </tr>
    <?php
    }
    ?>
</tbody>
<table>
    </div>
    </div>
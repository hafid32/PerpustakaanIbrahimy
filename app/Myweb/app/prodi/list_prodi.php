<div class="card">
    <div class="card-header">
        PEMINJAMAN BUKU DI PERPUSTAKAAN IBRAHIMY
    </div>
    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'index.php?page=prodi&act=input'; ?>">
            <i class="fa-solid fa-circle-plus"></i> Tambah Data</a>
        <?php
        $query = $db->query("SELECT * FROM prodi;");
        ?>
        <table class="table table-striped">
    </div>
</div>

<thead>
    <tr>
        <th>No.</th>
        <th>KD Buku</th>
        <th>Peminjam</th>
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
                href=" <?php echo base_url(); ?>index.php?page=prodi&act=edit&kd_prodi=<?php echo $row['kd_prodi']; ?>"><i
                    class="fa-solid fa-pen-to-square"></i></a>
            <a class="btn btn-outline-danger btn-sm"
                href=" <?php echo base_url(); ?>index.php?page=prodi&act=hapus&kd_prodi=<?php echo $row['kd_prodi']; ?>"><i
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
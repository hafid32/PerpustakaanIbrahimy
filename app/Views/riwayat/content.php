<?php
echo $this->extend('template/index');
echo $this->section('content');?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">NO.</th>
                            <th>Kode Buku</th>
                            <th>Nama Buku</th>
                            <th>Peminjam</th>
                            <th>Pengembali</th>
                            <th>NIS</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_riwayat as $r){  
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $r['kd_buku']; ?> </td>
                                <td> <?php echo $r['nm_buku']; ?> </td>
                                <td> <?php echo $r['pinjam']; ?> </td>
                                <td> <?php echo $r['kembali']; ?> </td>
                                <td> <?php echo $r['nis']; ?> </td>
                                <td> <?php echo $r['kategori']; ?> </td>
                            </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
    
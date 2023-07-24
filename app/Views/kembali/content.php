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
                <?php 
                if (session()->getFlashdata('success')){
                ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-check"></i>الحمد لله رب العالمين</h5>
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                        <?php
                }
                ?>

                
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/kembali/tambah">
                    <i class="fa-solid fa-plus"></i>Tambah Buku</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">NO.</th>
                            <th>Kode Buku</th>
                            <th>Nama Buku</th>
                            <th>Pengembali</th>
                            <th>NIS</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_kembali as $r){  
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $r['kd_buku']; ?> </td>
                                <td> <?php echo $r['nm_buku']; ?> </td>
                                <td> <?php echo $r['kembali']; ?> </td>
                                <td> <?php echo $r['nis']; ?> </td>
                                <td> <?php echo $r['kategori']; ?> </td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo base_url();?>/kembali/edit/<?php echo $r['kd_buku']; ?>"><i class="fa-solid fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['kd_buku'];?>);"><i class="fa-solid fa-trash"></i></a>
                                </td>
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
    <script>
        function hapusConfig(id){
            Swal.fire({
  title: 'Anda yakin ingin menghapus data ini?',
  text: "jika setuju data akan di hapus secara permanen",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Uhibbuhā ikhtiyārī'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href='<?php echo base_url()?>/kembali/hapus/'+ id;
  }
}) 
        }
    </script>
    <?php echo $this->endSection();?>
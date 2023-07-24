<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header --> 
             <form action="<?php echo $action; ?>" method="post" autocomplate="off">
                <div class="card-body">
                    <?php if (validation_errors()) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-ban"></i>Alert!</h5>
                            <?php echo validation_list_errors() ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php 
                    if (session()->getFlashdata('error')){
                    ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5><i class="icon fas fa-warning"></i>!إِنَّا لِلَّهِ وَإِنَّا إِلَيْهِ رَاجِعُونَ</h5>
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                            <?php
                    }
                    ?>
                    <?php echo csrf_field() ?>
<?php 
if(current_url(true)->getSegment(2) =='edit'){
    ?>
    <input type="hidden" name="param" id="param" value="<?php echo $edit_kembali['kd_buku'];?>">
    <?php
}
?>
                    <div class="form-group">
                        <label for="kd_buku">Kode Buku</label>
                        <input type="text" name="kd_buku" id="kd_buku" value="<?php echo empty(set_value('kd_buku')) ? (empty($edit_pinjam['kd_buku']) ? "":$edit_pinjam['kd_buku']) : set_value('kd_buku') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nm_buku">Nama Buku</label>
                        <input type="text" name="nm_buku" id="nm_buku" value="<?php echo empty(set_value('nm_buku')) ? (empty($edit_pinjam['nm_buku']) ? "":$edit_pinjam['nm_buku']) : set_value('nm_buku') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pinjam">Pinjam</label>
                        <input type="text" name="pinjam" id="pinjam" value="<?php echo empty(set_value('pinjam')) ? (empty($edit_pinjam['pinjam']) ? "":$edit_pinjam['pinjam']) : set_value('pinjam') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nis">Nis</label>
                        <input type="text" name="nis" id="nis" value="<?php echo empty(set_value('nis')) ? (empty($edit_pinjam['nis']) ? "":$edit_pinjam['nis']) : set_value('nis') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Buku</label>
                        <input type="text" name="kategori" id="kategori" value="<?php echo empty(set_value('kategori')) ? (empty($edit_pinjam['kategori']) ? "":$edit_pinjam['kategori']) : set_value('kategori') ; ?>" class="form-control">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <?php
echo $this->endSection();
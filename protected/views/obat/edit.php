<?php 
    $baseUrl         = Yii::app()->request->baseUrl; 
    $obat_id         = $obat['obat_id'];
    $obat_nama       = $obat['obat_nama'];
    $obat_harga      = $obat['obat_harga'];
    $obat_keterangan = $obat['obat_keterangan']; 
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Obat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/obat">Obat</a></li>
                    <li class="breadcrumb-item active">Edit Obat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/obat/edit_action" method="post" id="myForm">
            <input type="hidden" name="obat_id" value="<?= $obat_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/obat" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <input type="text" name="obat_nama" placeholder="Contoh: Betadine Kumur" class="form-control" value="<?= $obat_nama ?>" required autofocus>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="obat_harga" placeholder="0" class="form-control" value="<?= $obat_harga ?>" min="1" required>
                        </div>
                	</div>
                	<div class="col-lg-8">
                        <div class="form-group">
                            <label>Keterangan Obat</label>
                            <textarea name="obat_keterangan" class="form-control" cols="30" rows="10" style="resize: none;" placeholder="Masukkan keterangan obat di sini..."><?= $obat_keterangan ?></textarea>
                        </div>
                	</div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <button type="submit" name="reset" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
    				</div>
    			</div>
            </div>
        </form>

    </div>
</section>

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/obat.js?v=<?= filemtime('assets/JS/obat.js') ?>"></script>

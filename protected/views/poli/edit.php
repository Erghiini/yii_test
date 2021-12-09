<?php
$baseUrl            = Yii::app()->request->baseUrl;
$poli_id            = trim($poli['poli_id']);
$poli_nama          = trim($poli['poli_nama']);
$poli_harga         = trim($poli['poli_harga']);
$poli_keterangan    = trim($poli['poli_keterangan']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Poli</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= Yii::app()->request->baseUrl ?>/poli">Poli</a></li>
                    <li class="breadcrumb-item active">Edit Poli</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/poli/edit_action" method="post" id="myForm">
            <input type="hidden" name="poli_id" value="<?= $poli_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/poli" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row">
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Nama Poli</label>
                            <input type="text" name="poli_nama" placeholder="Contoh: Asep" class="form-control" value="<?= $poli_nama ?>" autofocus required>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tarif</label>
                            <input type="number" name="poli_harga" placeholder="0" min="1" class="form-control" value="<?= $poli_harga ?>" required>
                        </div>
                	</div>
                </div>
                <div class="row">
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="poli_keterangan" class="form-control" rows="4" placeholder="Isi keterangan di sini..." style="resize: none;"><?= $poli_keterangan ?></textarea>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/poli.js?v=<?= filemtime('assets/JS/poli.js') ?>"></script>

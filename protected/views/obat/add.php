<?php $baseUrl = Yii::app()->request->baseUrl; ?>

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
                    <li class="breadcrumb-item active">Tambah Obat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/obat/add_action" method="post" id="myForm">
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
                            <input type="text" name="obat_nama" placeholder="Contoh: Betadine Kumur" class="form-control" required autofocus>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="obat_harga" placeholder="0" class="form-control" min="1" required>
                        </div>
                	</div>
                	<div class="col-lg-8">
                        <div class="form-group">
                            <label>Keterangan Obat</label>
                            <textarea name="obat_keterangan" class="form-control" cols="30" rows="10" style="resize: none;" placeholder="Masukkan keterangan obat di sini..."></textarea>
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

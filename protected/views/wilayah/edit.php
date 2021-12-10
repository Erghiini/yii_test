<?php
    $baseUrl        = Yii::app()->request->baseUrl;
    $wilayah_id     = $wilayah['wilayah_id'];
    $wilayah_nama   = $wilayah['wilayah_nama'];
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Wilayah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/wilayah">Wilayah</a></li>
                    <li class="breadcrumb-item active">Ubah Wilayah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/wilayah/edit_action" method="post" id="myForm">
            <input type="hidden" name="wilayah_id" value="<?= $wilayah_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/wilayah" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Wilayah</label>
                            <input type="text" name="wilayah_nama" placeholder="Contoh: PASTEUR" class="form-control" maxlength="50" value="<?= $wilayah_nama ?>" required>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/wilayah.js?v=<?= filemtime('assets/JS/wilayah.js') ?>"></script>

<?php
$baseUrl            = Yii::app()->request->baseUrl;
$pasien_id          = trim($pasien['pasien_id']);
$pasien_nama        = trim($pasien['pasien_nama']);
$pasien_jk          = trim($pasien['pasien_jk']);
$pasien_tempatLahir = trim($pasien['pasien_tempatLahir']);
$pasien_tglLahir    = $pasien['pasien_tglLahir'];
$pasien_alamat      = trim($pasien['pasien_alamat']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= Yii::app()->request->baseUrl ?>/pasien">Pasien</a></li>
                    <li class="breadcrumb-item active">Edit Pasien</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/pasien/edit_action" method="post" id="myForm">
            <input type="hidden" name="pasien_id" value="<?= $pasien_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/pasien" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row">
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" name="pasien_nama" placeholder="Contoh: Asep" class="form-control" value="<?= $pasien_nama ?>" autofocus required>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="pasien_tempatLahir" placeholder="Contoh: Bandung" class="form-control" value="<?= $pasien_tempatLahir ?>" required>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="pasien_tglLahir" class="form-control" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d', strtotime($pasien_tglLahir)) ?>" required>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div style="display: flex;">
                                <label style="margin-right: 1rem;">
                                    <input type="radio" name="pasien_jk" value="L" required <?= $pasien_jk == 'L' ? 'checked' : '' ?>> Laki-laki
                                </label>
                                <label><input type="radio" name="pasien_jk" value="P" <?= $pasien_jk == 'P' ? 'checked' : '' ?>> Perempuan</label>
                            </div>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="pasien_alamat" class="form-control" rows="4" required style="resize: none;"><?= $pasien_alamat ?></textarea>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/pasien.js?v=<?= filemtime('assets/JS/pasien.js') ?>"></script>

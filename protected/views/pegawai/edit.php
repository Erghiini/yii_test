<?php
$baseUrl            = Yii::app()->request->baseUrl;
$pegawai_id          = trim($pegawai['pegawai_id']);
$pegawai_nik         = trim($pegawai['pegawai_nik']);
$pegawai_nama        = trim($pegawai['pegawai_nama']);
$pegawai_telp        = trim($pegawai['pegawai_telp']);
$pegawai_tempatLahir = trim($pegawai['pegawai_tempatLahir']);
$pegawai_tglLahir    = $pegawai['pegawai_tglLahir'];
$pegawai_alamat      = trim($pegawai['pegawai_alamat']);
$pegawai_jk      = trim($pegawai['pegawai_jk']);
?>
<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= Yii::app()->request->baseUrl ?>/pegawai">Pegawai</a></li>
                    <li class="breadcrumb-item active">Edit Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/pegawai/edit_action" method="post" id="myForm">
            <input type="hidden" name="pegawai_id" value="<?= $pegawai_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/pegawai" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>NIK Pegawai</label>
                            <input type="text" name="pegawai_nik" placeholder="Contoh: 1234567890123456" class="form-control" pattern="[0-9]+" maxlength="16" autofocus required value="<?= $pegawai_nik ?>">
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="pegawai_nama" placeholder="Contoh: Asep" class="form-control" pattern="[a-zA-Z .]+" maxlength="100" required value="<?= $pegawai_nama ?>">
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Nomor Telpon</label>
                            <input type="text" name="pegawai_telp" placeholder="Contoh: 081234567890" class="form-control" pattern="[0-9]+" maxlength="13" required value="<?= $pegawai_telp ?>">
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="pegawai_tempatLahir" placeholder="Contoh: Bandung" class="form-control" pattern="[a-zA-Z .]+" maxlength="50" required value="<?= $pegawai_tempatLahir ?>">
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="pegawai_tglLahir" class="form-control" max="<?= date('Y-m-d') ?>" required value="<?= $pegawai_tglLahir ?>">
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div style="display: flex;">
                                <label style="margin-right: 1rem;">
                                    <input type="radio" name="pegawai_jk" value="L" required <?= $pegawai_jk == 'L' ? 'checked' : '' ?>> Laki-laki
                                </label>
                                <label><input type="radio" name="pegawai_jk" value="P" <?= $pegawai_jk == 'P' ? 'checked' : '' ?>> Perempuan</label>
                            </div>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="pegawai_alamat" class="form-control" rows="4" required style="resize: none;"><?= $pegawai_alamat ?></textarea>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/pegawai.js?v=<?= filemtime('assets/JS/pegawai.js') ?>"></script>

<?php
$baseUrl            = Yii::app()->request->baseUrl;
$dokter_id          = trim($dokter['dokter_id']);
$dokter_nomor_str   = trim($dokter['dokter_nomor_str']);
$poli_id            = trim($dokter['poli_id']);
$dokter_nama        = trim($dokter['dokter_nama']);
$dokter_jk          = trim($dokter['dokter_jk']);
$dokter_tempatLahir = trim($dokter['dokter_tempatLahir']);
$dokter_tglLahir    = $dokter['dokter_tglLahir'];
$dokter_alamat      = trim($dokter['dokter_alamat']);
$dokter_keterangan  = trim($dokter['dokter_keterangan']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/dokter">Dokter</a></li>
                    <li class="breadcrumb-item active">Edit Dokter</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/dokter/edit_action" method="post" id="myForm">
            <input type="hidden" name="dokter_id" value="<?= $dokter_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/dokter" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Nomor STR</label>
                            <input type="text" name="dokter_nomor_str" placeholder="Contoh: 20 09 5 2 1 18-1234567" class="form-control" maxlength="22" pattern="[0-9 -]+" value="<?= $dokter_nomor_str ?>" autofocus required>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Poli</label>
                            <select class="form-control" name="poli_id">
                                <?php
                                    foreach ($poli as $data) {
                                        $d_poli_id    = trim($data['poli_id']);
                                        $d_poli_nama  = trim($data['poli_nama']);

                                        echo '<option value="'. $d_poli_id .'" '. ($d_poli_id == $poli_id ? 'selected' : '') .'>'. $d_poli_nama .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Dokter</label>
                            <input type="text" name="dokter_nama" placeholder="Contoh: Asep" class="form-control" value="<?= $dokter_nama ?>" required>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div style="display: flex;">
                                <label style="margin-right: 1rem;">
                                    <input type="radio" name="dokter_jk" value="L" required <?= $dokter_jk == 'L' ? 'checked' : '' ?>> Laki-laki
                                </label>
                                <label><input type="radio" name="dokter_jk" value="P" <?= $dokter_jk == 'P' ? 'checked' : '' ?>> Perempuan</label>
                            </div>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="dokter_tempatLahir" placeholder="Contoh: Bandung" class="form-control" value="<?= $dokter_tempatLahir ?>" required>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="dokter_tglLahir" class="form-control" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d', strtotime($dokter_tglLahir)) ?>" required>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="dokter_alamat" class="form-control" rows="4" required style="resize: none;" placeholder="Alamat lengkap..."><?= $dokter_alamat ?></textarea>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="dokter_keterangan" class="form-control" rows="4" style="resize: none;"placeholder="Isi keterangan di sini..."><?= $dokter_keterangan ?></textarea>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/dokter.js?v=<?= filemtime('assets/JS/dokter.js') ?>"></script>

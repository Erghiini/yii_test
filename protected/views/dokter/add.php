<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= Yii::app()->request->baseUrl ?>/dokter">Dokter</a></li>
                    <li class="breadcrumb-item active">Tambah Dokter</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/dokter/add_action" method="post" id="myForm">
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
                            <input type="text" name="dokter_nomor_str" placeholder="Contoh: 20 09 5 2 1 18-1234567" class="form-control" maxlength="22" pattern="[0-9 -]+" autofocus required>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Poli</label>
                            <select class="form-control" name="poli_id">
                                <?php
                                    foreach ($poli as $data) {
                                        $poli_id    = trim($data['poli_id']);
                                        $poli_nama  = trim($data['poli_nama']);

                                        echo '<option value="'. $poli_id .'">'. $poli_nama .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                	</div>
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Dokter</label>
                            <input type="text" name="dokter_nama" placeholder="Contoh: Dr. Cecep" class="form-control" autofocus required>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div style="display: flex;">
                                <label style="margin-right: 1rem;"><input type="radio" name="dokter_jk" value="L" required> Laki-laki</label>
                                <label><input type="radio" name="dokter_jk" value="P"> Perempuan</label>
                            </div>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="dokter_tempatLahir" placeholder="Contoh: Bandung" class="form-control" required>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="dokter_tglLahir" class="form-control" max="<?= date('Y-m-d', strtotime('-17 year')) ?>" required>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="dokter_alamat" class="form-control" rows="4" required style="resize: none;" placeholder="Alamat lengkap..."></textarea>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="dokter_keterangan" class="form-control" rows="4" style="resize: none;" placeholder="Isi keterangan di sini..."></textarea>
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

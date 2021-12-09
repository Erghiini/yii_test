<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pendaftaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= Yii::app()->request->baseUrl ?>/pendaftaran">Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Tambah Pendaftaran</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/pendaftaran/add_action" method="post" id="myForm">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/pendaftaran" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" name="" class="form-control" value="<?= date('Y-m-d') ?>" disabled>
                        </div>
                    </div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <select name="pasien_id" id="pasien_id" class="form-control" autofocus required>
                                <option>Nama Pasien</option>
                            </select>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="" id="pasien_tempatLahir" placeholder="-" class="form-control" disabled>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="" id="pasien_tglLahir" class="form-control" max="<?= date('Y-m-d') ?>" placeholder="-" disabled>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="" id="pasien_alamat" class="form-control" rows="4" placeholder="-" disabled style="resize: none;"></textarea>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Poli</label>
                            <select name="poli_id" id="poli_id" class="form-control" required>
                                <option selected disabled>Pilih Poli</option>
    							<?php
    								$no = 0;
    								foreach ($poli as $data) {
    									$no++;
    									$poli_id          = trim($data['poli_id']);
    									$poli_nama        = trim($data['poli_nama']);

    									echo '<option value="'. $poli_id .'">'. $poli_nama .'</option>';
    								}
    							?>
                            </select>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Dokter</label>
                            <select name="dokter_id" id="dokter_id" class="form-control" required>
                                <option selected disabled>Pilih Dokter</option>
                            </select>
                        </div>
                	</div>
                </div>
            	<div class="row">
                	<div class="col-lg-6">
                        <div class="form-group">
                            <label>Keluhan</label>
                            <textarea name="pendaftaran_keluhan" class="form-control" rows="4" placeholder="Contoh: Gatal-gatal" required style="resize: none;"></textarea>
                        </div>
                	</div>
                	<div class="col-lg-6">
                        <div class="form-group">
                            <label>Diagnosa</label>
                            <textarea name="pendaftaran_diagnosa" class="form-control" rows="4" placeholder="Contoh: Alergi" style="resize: none;"></textarea>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/pendaftaran.js?v=<?= filemtime('assets/JS/pendaftaran.js') ?>"></script>

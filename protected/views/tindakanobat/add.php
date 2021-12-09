<?php
    $baseUrl = Yii::app()->request->baseUrl;
    $pendaftaran_id            = trim($tindakanobat['pendaftaran_id']);
    $pendaftaran_tglKunjungan  = trim($tindakanobat['pendaftaran_tglKunjungan']);
    $pasien_nama               = trim($tindakanobat['pasien_nama']);
    $pasien_jk                 = trim($tindakanobat['pasien_jk']);
    $pasien_tempatLahir        = trim($tindakanobat['pasien_tempatLahir']);
    $pasien_tglLahir           = trim($tindakanobat['pasien_tglLahir']);
    $pasien_alamat           = trim($tindakanobat['pasien_alamat']);
    $dokter_nama               = trim($tindakanobat['dokter_nama']);
    $poli_nama                 = trim($tindakanobat['poli_nama']);
    $pendaftaran_keluhan       = trim($tindakanobat['pendaftaran_keluhan']);
    $pendaftaran_diagnosa      = trim($tindakanobat['pendaftaran_diagnosa']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Tindakan & Obat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= Yii::app()->request->baseUrl ?>/tindakanobat">Tindakan & Obat</a></li>
                    <li class="breadcrumb-item active">Tambah Tindakan & Obat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/tindakanobat/add_action" method="post" id="myForm">
            <input type="hidden" name="pendaftaran_id" value="<?= $pendaftaran_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/tindakanobat" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" name="" class="form-control" value="<?= date('Y-m-d', strtotime($pendaftaran_tglKunjungan)) ?>" disabled>
                        </div>
                    </div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" name="" class="form-control" value="<?= $pasien_nama ?>" readonly>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="" placeholder="-" value="<?= $pasien_tempatLahir ?>" class="form-control" disabled>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="" class="form-control" placeholder="-" value="<?= date('Y-m-d', strtotime($pasien_tglLahir)) ?>" disabled>
                        </div>
                	</div>
                	<div class="col-lg-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="" id="pasien_alamat" class="form-control" rows="4" placeholder="-" disabled style="resize: none;"><?= $pasien_alamat ?></textarea>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Poli</label>
                            <input type="text" name="" placeholder="-" value="<?= $poli_nama ?>" class="form-control" disabled>
                        </div>
                	</div>
                	<div class="col-lg-3">
                        <div class="form-group">
                            <label>Dokter</label>
                            <input type="text" name="" placeholder="-" value="<?= $dokter_nama ?>" class="form-control" disabled>
                        </div>
                	</div>
                </div>
            	<div class="row">
                	<div class="col-lg-6">
                        <div class="form-group">
                            <label>Keluhan</label>
                            <textarea name="pendaftaran_keluhan" class="form-control" rows="4" placeholder="Contoh: Gatal-gatal" required style="resize: none;" readonly><?= $pendaftaran_keluhan ?></textarea>
                        </div>
                	</div>
                	<div class="col-lg-6">
                        <div class="form-group">
                            <label>Diagnosa</label>
                            <textarea name="pendaftaran_diagnosa" class="form-control" rows="4" placeholder="Contoh: Alergi" style="resize: none;"><?= $pendaftaran_diagnosa ?></textarea>
                        </div>
                	</div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tindakan</label>
                            <select class="form-control select2" name="tindakan_id">
                                <option selected disabled>Pilih Tindakan</option>
    							<?php
    								$no = 0;
    								foreach ($tindakan as $data) {
    									$no++;
    									$tindakan_id   = $data['tindakan_id'];
    									$tindakan_nama = trim($data['tindakan_nama']);

    									echo '<option value="'. $tindakan_id .'">'. $tindakan_nama .'</option>';
    								}
    							?>
                            </select>
                        </div>
                    </div>
                </div>

            	<div class="row">
                	<div class="col-lg-12">
                        <h4>Obat</h4>
                        <hr>
                	</div>
                </div>
            	<div class="row">
                	<div class="col-lg-12" id="list_obat">
                        <div class="card">
                            <div class="card-body">
                            	<div class="row">
                                	<div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Nama Obat</label>
                                            <select class="form-control obat_id" name="obat_id[]" required>
                                                <option>Masukkan Nama Obat</option>
                                            </select>
                                        </div>
                                	</div>
                                	<div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Jumlah Obat</label>
                                            <input type="number" name="obat_jumlah[]" class="form-control obat_jumlah" placeholder="0" min="1" required>
                                        </div>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                	<div class="col-lg-12">
                        <button type="button" class="btn btn-success" id="btn_tambah_obat" style="width: 100%;"><i class="fa fa-plus"></i> Tambah Obat</button>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/tindakanobat.js?v=<?= filemtime('assets/JS/tindakanobat.js') ?>"></script>

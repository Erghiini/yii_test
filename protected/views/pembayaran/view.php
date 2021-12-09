<?php
    $baseUrl = Yii::app()->request->baseUrl;
    $pendaftaran_id             = trim($pembayaran['pendaftaran_id']);
    $pendaftaran_tglKunjungan   = trim($pembayaran['pendaftaran_tglKunjungan']);
    $pasien_nama                = trim($pembayaran['pasien_nama']);
    $pasien_jk                  = trim($pembayaran['pasien_jk']);
    $pasien_tempatLahir         = trim($pembayaran['pasien_tempatLahir']);
    $pasien_tglLahir            = trim($pembayaran['pasien_tglLahir']);
    $pasien_alamat              = trim($pembayaran['pasien_alamat']);
    $dokter_nama                = trim($pembayaran['dokter_nama']);
    $poli_nama                  = trim($pembayaran['poli_nama']);
    $poli_harga                 = trim($pembayaran['poli_harga']);
    $pendaftaran_keluhan        = trim($pembayaran['pendaftaran_keluhan']);
    $pendaftaran_diagnosa       = trim($pembayaran['pendaftaran_diagnosa']);
    $pembayaran_id              = trim($pembayaran['pembayaran_id']);
    $pembayaran_total           = trim($pembayaran['pembayaran_total']);
    $pembayaran_pasien           = trim($pembayaran['pembayaran_pasien']);
    $pembayaran_kembali           = trim($pembayaran['pembayaran_kembali']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lihat Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/pembayaran">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Lihat Pembayaran</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tbody>
                            <tr>
                                <th>Tanggal Kunjungan</th>
                                <td>:</td>
                                <td><?= date('d-m-Y', strtotime($pendaftaran_tglKunjungan)) ?></td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>:</td>
                                <td><?= $pasien_nama ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><?= $pasien_alamat ?></td>
                            </tr>
                            <tr>
                                <th>Dokter</th>
                                <td>:</td>
                                <td><?= $dokter_nama ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h4>Dokter</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Dokter</th>
                                <th>Poli</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $dokter_nama ?></td>
                                <td><?= $poli_nama ?></td>
                                <td align="right">Rp<?= number_format($poli_harga, 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: right;">Rp<?= number_format($poli_harga, 0, ',', '.') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h4>Obat</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Harga Obat</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $subtotal_harga = 0;
                                foreach ($harga_obat as $data) {
                                    $obat_nama   = $data['obat_nama'];
                                    $obat_harga  = $data['obat_harga'];
                                    $obat_jumlah = $data['obat_jumlah'];
                                    $total_harga = $obat_harga * $obat_jumlah;
                                    $subtotal_harga = $subtotal_harga + $total_harga;

                                    echo '
                                        <tr>
                                            <td>'. $obat_nama .'</td>
                                            <td align="right">Rp'. number_format($obat_harga, 0, ',', '.') .'</td>
                                            <td align="right">'. number_format($obat_jumlah, 0, ',', '.') .'</td>
                                            <td align="right">Rp'. number_format($total_harga, 0, ',', '.') .'</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: right;">Rp<?= number_format($subtotal_harga, 0, ',', '.') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr style="text-align: right;">
                                <th>Total Tagihan: Rp<?= number_format($pembayaran_total, 0, ',', '.') ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h4>Pembayaran</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Jumlah Pembayaran</label>
                        <input type="number" name="pembayaran_pasien" id="pembayaran_pasien" class="form-control" required min="0" placeholder="0" value="<?= $pembayaran_pasien ?>" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Kembalian</label>
                        <input type="number" name="pembayaran_kembali" id="pembayaran_kembali" class="form-control" min="0" placeholder="0" value="0" value="<?= $pembayaran_kembali ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/pembayaran.js?v=<?= filemtime('assets/JS/pembayaran.js') ?>"></script>

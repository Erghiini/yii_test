<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Tindakan & Obat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tindakan & Obat</li>
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
            <!-- <div class="row">
            	<div class="col-lg-12" align="right">
					<a href="<?= $baseUrl ?>/pendaftaran/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Tindakan & Obat</a>
					<hr>
				</div>
			</div> -->
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>Tanggal Kunjungan</th>
            					<th>Nama Pasien</th>
            					<th>Jenis Kelamin</th>
            					<th>Tempat Tanggal Lahir</th>
            					<th>Nama Dokter</th>
            					<th>Poli</th>
            					<th>Keluhan</th>
                                <th>Diagnosa</th>
                                <th>Tindakan</th>
            					<th>Status</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
						<tbody>
							<?php
                                $listStatus = array(
                                    '1' => '<span class="badge badge-danger">Menunggu<br>Tindakan</span>',
                                    '2' => '<span class="badge badge-info">Pembayaran</span>',
                                    '3' => '<span class="badge badge-success">Selesai</span>'
                                );
								$no = 0;
								foreach ($tindakanobat as $data) {
									$no++;
									$pendaftaran_id            = trim($data['pendaftaran_id']);
									$pendaftaran_tglKunjungan  = trim($data['pendaftaran_tglKunjungan']);
									$pasien_nama               = trim($data['pasien_nama']);
									$pasien_jk                 = trim($data['pasien_jk']);
									$pasien_tempatLahir        = trim($data['pasien_tempatLahir']);
									$pasien_tglLahir           = trim($data['pasien_tglLahir']);
									$dokter_nama               = trim($data['dokter_nama']);
									$poli_nama                 = trim($data['poli_nama']);
									$pendaftaran_keluhan       = trim($data['pendaftaran_keluhan']);
                                    $pendaftaran_diagnosa      = trim($data['pendaftaran_diagnosa']);
                                    $tindakan_nama             = trim($data['tindakan_nama']);
									$pendaftaran_status        = trim($data['pendaftaran_status']);

                                    if ($pendaftaran_status == 1) {
                                        $addBtn = '<a href="'. $baseUrl .'/tindakanobat/add/'. $pendaftaran_id .'" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>';
                                    } else if ($pendaftaran_status == 2) {
                                        $addBtn = '<a href="'. $baseUrl .'/tindakanobat/edit/'. $pendaftaran_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>';
                                        $addBtn = '&nbsp;';
                                    } else {
                                        $addBtn = '&nbsp;';
                                    }

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. date('Y/m/d', strtotime($pendaftaran_tglKunjungan)) .'</td>
											<td>'. $pasien_nama .'</td>
											<td>'. $pasien_jk .'</td>
											<td>'. $pasien_tempatLahir .', '. date('d/m/Y', strtotime($pasien_tglLahir)) .'</td>
											<td>'. $dokter_nama .'</td>
											<td>'. $poli_nama .'</td>
											<td>'. $pendaftaran_keluhan .'</td>
                                            <td>'. $pendaftaran_diagnosa .'</td>
                                            <td>'. ($tindakan_nama == '' ? '-' : $tindakan_nama) .'</td>
											<td align="center">'. $listStatus[$pendaftaran_status] .'</td>
                                            <td align="center">
                                                '. $addBtn .'
                                            </td>
										</tr>
									';
								}
							?>
						</tbody>
            		</table>
            	</div>
            </div>
        </div>

    </div>
</section>
<!-- /.content -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').dataTable({
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
			responsive: true
		});
	});
</script>

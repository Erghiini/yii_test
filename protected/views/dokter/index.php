<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dokter</li>
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
            	<div class="col-lg-12" align="right">
					<a href="<?= $baseUrl ?>/dokter/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Dokter</a>
					<hr>
				</div>
			</div>
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>Nomor STR</th>
            					<th>Poli</th>
            					<th>Nama Dokter</th>
            					<th>Jenis Kelamin</th>
            					<th>Tempat Lahir</th>
            					<th>Tanggal Lahir</th>
            					<th>Alamat</th>
            					<th>Keterangan</th>
            					<th>Tanggal Input</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
						<tbody>
							<?php
								$no = 0;
								foreach ($dokter as $data) {
									$no++;
									$dokter_id          = trim($data['dokter_id']);
									$dokter_nomor_str   = trim($data['dokter_nomor_str']);
									$poli_nama          = trim($data['poli_nama']);
									$dokter_nama        = trim($data['dokter_nama']);
									$dokter_jk          = trim($data['dokter_jk']);
									$dokter_tempatLahir = trim($data['dokter_tempatLahir']);
									$dokter_tglLahir    = $data['dokter_tglLahir'];
									$dokter_alamat      = trim($data['dokter_alamat']);
									$dokter_keterangan  = trim($data['dokter_keterangan']);
									$created_date       = trim($data['created_date']);

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. $dokter_nomor_str .'</td>
											<td>'. $poli_nama .'</td>
											<td>'. $dokter_nama .'</td>
											<td>'. $dokter_jk .'</td>
											<td>'. $dokter_tempatLahir .'</td>
											<td>'. date('d-M-Y', strtotime($dokter_tglLahir)) .'</td>
											<td>'. $dokter_alamat .'</td>
											<td>'. $dokter_keterangan .'</td>
											<td>'. date('d-M-Y', strtotime($created_date)) .'</td>
                                            <td align="center">
                                                <a href="'. $baseUrl .'/dokter/edit/'. $dokter_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
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

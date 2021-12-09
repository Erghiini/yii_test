<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
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
					<a href="<?= $baseUrl ?>/pegawai/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pegawai</a>
					<hr>
				</div>
			</div>
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>Nama Pegawai</th>
            					<th>Tempat Lahir</th>
            					<th>Tanggal Lahir</th>
            					<th>Alamat</th>
            					<th>Tanggal Input</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
						<tbody>
							<?php
								$no = 0;
								foreach ($pegawai as $data) {
									$no++;
									$pegawai_id          = trim($data['pegawai_id']);
									$pegawai_nama        = trim($data['pegawai_nama']);
									$pegawai_tempatLahir = trim($data['pegawai_tempatLahir']);
									$pegawai_tglLahir    = $data['pegawai_tglLahir'];
									$pegawai_alamat      = trim($data['pegawai_alamat']);
									$created_date        = trim($data['created_date']);

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. $pegawai_nama .'</td>
											<td>'. $pegawai_tempatLahir .'</td>
											<td>'. date('d-M-Y', strtotime($pegawai_tglLahir)) .'</td>
											<td>'. $pegawai_alamat .'</td>
											<td>'. date('d-M-Y', strtotime($created_date)) .'</td>
                                            <td align="center">
                                                <a href="'. $baseUrl .'/pegawai/edit/'. $pegawai_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
												<button type="button" class="btn btn-sm btn-danger delete-btn" value="'. $pegawai_id .'" data-toggle="tooltip" title="Hapus" ><i class="fa fa-trash"></i></button>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/pegawai.js?v=<?= filemtime('assets/JS/pegawai.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').dataTable({
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
			responsive: true
		});
	});
</script>

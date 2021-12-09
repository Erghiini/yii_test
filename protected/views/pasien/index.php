<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pasien</li>
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
					<a href="<?= $baseUrl ?>/pasien/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pasien</a>
					<hr>
				</div>
			</div>
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>Nama Pasien</th>
            					<th>Jenis Kelamin</th>
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
								foreach ($pasien as $data) {
									$no++;
									$pasien_id          = trim($data['pasien_id']);
									$pasien_nama        = trim($data['pasien_nama']);
									$pasien_jk          = trim($data['pasien_jk']);
									$pasien_tempatLahir = trim($data['pasien_tempatLahir']);
									$pasien_tglLahir    = $data['pasien_tglLahir'];
									$pasien_alamat      = trim($data['pasien_alamat']);
									$created_date       = trim($data['created_date']);

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. $pasien_nama .'</td>
											<td>'. $pasien_jk .'</td>
											<td>'. $pasien_tempatLahir .'</td>
											<td>'. date('d-M-Y', strtotime($pasien_tglLahir)) .'</td>
											<td>'. $pasien_alamat .'</td>
											<td>'. date('d-M-Y', strtotime($created_date)) .'</td>
                                            <td align="center">
                                                <a href="'. $baseUrl .'/pasien/edit/'. $pasien_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
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

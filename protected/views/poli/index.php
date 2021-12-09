<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Poli</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Poli</li>
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
					<a href="<?= $baseUrl ?>/poli/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Poli</a>
					<hr>
				</div>
			</div>
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>Nama Poli</th>
            					<th>Tarif</th>
            					<th>Keterangan</th>
            					<th>Tanggal Input</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
						<tbody>
							<?php
								$no = 0;
								foreach ($poli as $data) {
									$no++;
									$poli_id          = trim($data['poli_id']);
									$poli_nama        = trim($data['poli_nama']);
									$poli_harga  	  = trim($data['poli_harga']);
									$poli_keterangan  = trim($data['poli_keterangan']);
									$created_date     = trim($data['created_date']);

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. $poli_nama .'</td>
											<td>Rp'. number_format($poli_harga, 0, ',', '.') .'</td>
											<td>'. $poli_keterangan .'</td>
											<td>'. date('d-M-Y', strtotime($created_date)) .'</td>
                                            <td align="center">
                                                <a href="'. $baseUrl .'/poli/edit/'. $poli_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
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

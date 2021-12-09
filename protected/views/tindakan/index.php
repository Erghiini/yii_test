<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Tindakan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tindakan</li>
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
					<a href="<?= $baseUrl ?>/tindakan/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Tindakan</a>
					<hr>
				</div>
			</div>
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>Nama Tindakan</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
						<tbody>
							<?php
								$no = 0;
								foreach ($tindakan as $data) {
									$no++;
									$tindakan_id   = $data['tindakan_id'];
									$tindakan_kode = trim($data['tindakan_kode']);
									$tindakan_nama = trim($data['tindakan_nama']);

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. $tindakan_nama .'</td>
                                            <td align="center">
                                                <a href="'. $baseUrl .'/tindakan/edit/'. $tindakan_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
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

<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Wilayah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Wilayah</li>
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
					<a href="<?= $baseUrl ?>/wilayah/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Wilayah</a>
					<hr>
				</div>
			</div>
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>Nama Wilayah</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
						<tbody>
							<?php
								$no = 0;
								foreach ($wilayah as $data) {
									$no++;
									$wilayah_id   = $data['wilayah_id'];
									$wilayah_nama = trim($data['wilayah_nama']);

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. $wilayah_nama .'</td>
                                            <td align="center">
                                                <a href="'. $baseUrl .'/wilayah/edit/'. $wilayah_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
												<button type="button" class="btn btn-sm btn-danger delete-btn" value="'. $wilayah_id .'" data-toggle="tooltip" title="Hapus" ><i class="fa fa-trash"></i></button>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/wilayah.js?v=<?= filemtime('assets/JS/wilayah.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').dataTable({
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
			responsive: true
		});
	});
</script>

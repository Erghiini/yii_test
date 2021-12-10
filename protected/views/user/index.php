<?php $baseUrl = Yii::app()->request->baseUrl; ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">User</li>
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
					<a href="<?= $baseUrl ?>/user/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
					<hr>
				</div>
			</div>
            <div class="row">
            	<div class="col-lg-12">
            		<table class="table table-bordered table-hover" id="myTable">
            			<thead>
            				<tr>
            					<th style="text-align: center;">#</th>
            					<th>User Name</th>
            					<th>Level</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
						<tbody>
							<?php
								$no = 0;
								foreach ($user as $data) {
									$no++;
									$user_id    = trim($data['user_id']);
									$user_name  = trim($data['user_name']);
									$user_level = trim($data['user_level']);

									echo '
										<tr>
											<td align="center">'. $no .'.</td>
											<td>'. $user_name .'</td>
											<td>'. $user_level .'</td>
                                            <td align="center">
                                                <a href="'. $baseUrl .'/user/edit/'. $user_id .'" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
												<button type="button" class="btn btn-sm btn-info reset-btn" value="'. $user_id .'" data-toggle="tooltip" title="Reset Password" ><i class="fa fa-redo"></i></button>
												<button type="button" class="btn btn-sm btn-danger delete-btn" value="'. $user_id .'" data-toggle="tooltip" title="Hapus" ><i class="fa fa-trash"></i></button>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/user.js?v=<?= filemtime('assets/JS/user.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').dataTable({
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
			responsive: true
		});
	});
</script>

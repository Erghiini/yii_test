<?php
$baseUrl    = Yii::app()->request->baseUrl;
$user_id    = trim($user['user_id']);
$user_name  = trim($user['user_name']);
$user_level = trim($user['user_level']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/user/edit_action" method="post" id="myForm">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <div class="card-body">
                <div class="row">
                	<div class="col-lg-12" align="right">
                        <a href="<?= $baseUrl ?>/user" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
    					<hr>
    				</div>
    			</div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="" placeholder="Contoh: Asep" class="form-control" value="<?= $user_name ?>" readonly>
                        </div>
                	</div>
                </div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" name="" class="form-control" value="<?= $user_level ?>" readonly>
                        </div>
                	</div>
                </div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <a href="<?= $baseUrl ?>/profile/ubahpassword" class="btn btn-sm btn-info" data-toggle="tooltip" title="Reset Password" style="width: 100%;">
                                <i class="fa fa-redo"></i> Ubah Password
                            </a>
                        </div>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/profile.js?v=<?= filemtime('assets/JS/profile.js') ?>"></script>

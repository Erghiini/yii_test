<?php
$baseUrl    = Yii::app()->request->baseUrl;
$user_name  = trim($user['user_name']);
$user_level = trim($user['user_level']);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/profile">Profile</a></li>
                    <li class="breadcrumb-item active">Ubah Password</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">

        <form action="<?= $baseUrl ?>/profile/ubahpassword_action" method="post" id="formUbahPassword">
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
                            <label>Password Lama</label>
                            <input type="password" name="password_lama" placeholder="******" class="form-control">
                        </div>
                	</div>
                </div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password_baru" placeholder="******" class="form-control">
                        </div>
                	</div>
                </div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="kofirm_password_baru" placeholder="******" class="form-control">
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

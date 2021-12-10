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
                <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/user">User</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                            <input type="text" name="user_name" placeholder="Contoh: Asep" class="form-control" pattern="[a-zA-Z]+" maxlength="100" minlength="2" value="<?= $user_name ?>" required>
                        </div>
                	</div>
                </div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="user_level" required>
                                <option value="0" <?= $user_level == '0' ? 'selected' : '' ?>>0</option>
                                <option value="1" <?= $user_level == '1' ? 'selected' : '' ?>>1</option>
                            </select>
                        </div>
                	</div>
                </div>
                <div class="row" style="justify-content: center;">
                	<div class="col-lg-4">
                        <div class="form-group">
                            <button type="button" class="btn btn-sm btn-info reset-btn" value="<?= $user_id ?>" data-toggle="tooltip" title="Reset Password" style="width: 100%;"><i class="fa fa-redo"></i> Reset Password</button>
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

<script type="text/javascript" src="<?= $baseUrl ?>/assets/JS/user.js?v=<?= filemtime('assets/JS/user.js') ?>"></script>

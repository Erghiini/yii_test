<?php
    $baseUrl    = Yii::app()->request->baseUrl;
    $controller = Yii::app()->controller->id;
    $session    = Yii::app()->session;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Klinik</title>
    <meta name="description" content="Sistem Informasi Klinik, Created by: Erghi Imannur Ichsan">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/dist/css/adminlte.min.css">

    <!-- jQuery -->
    <script src="<?= $baseUrl ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= $baseUrl ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= $baseUrl ?>/assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= $baseUrl ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= $baseUrl ?>/assets/dist/js/adminlte.min.js"></script>
    <!-- Cutom Script -->
    <script type="text/javascript">const baseUrl = '<?= $baseUrl ?>';</script>
    <script src="<?= $baseUrl ?>/assets/JS/script.js?v=<?= filemtime('assets/JS/script.js') ?>"></script>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= $baseUrl ?>/logout" class="nav-link"><i class="fa fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= $baseUrl ?>/assets/index3.html" class="brand-link">
                <img src="<?= $baseUrl ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $session['username'] ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/dashboard" class="nav-link <?= $controller == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">
                            MASTER
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/wilayah" class="nav-link">
                                <i class="nav-icon fas fa-map-marked-alt"></i>
                                <p>
                                    Wilayah
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/pegawai" class="nav-link <?= $controller == 'pegawai' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-hospital-user"></i>
                                <p>
                                    Pegawai
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/poli" class="nav-link <?= $controller == 'poli' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-microscope"></i>
                                <p>
                                    Poli
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/dokter" class="nav-link <?= $controller == 'dokter' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user-md"></i>
                                <p>
                                    Dokter
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/tindakan" class="nav-link <?= $controller == 'tindakan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-briefcase-medical"></i>
                                <p>
                                    Tindakan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/obat" class="nav-link <?= $controller == 'obat' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-pills"></i>
                                <p>
                                    Obat
                                </p>
                            </a>
                        </li>


                        <li class="nav-header">
                            PASIEN
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/pasien" class="nav-link <?= $controller == 'pasien' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Data Pasien
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/pendaftaran" class="nav-link <?= $controller == 'pendaftaran' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Pendaftaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/tindakanobat" class="nav-link <?= $controller == 'tindakanobat' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p>
                                    Tindakan & Obat
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseUrl ?>/pembayaran" class="nav-link <?= $controller == 'pembayaran' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    Pembayaran Pasien
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php echo $content;?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <div class="modal fade" id="ModalProgress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div style="display:table; height: 100%; min-width: 300px; margin: auto;">
            <div class="modal-dialog" style="display: table-cell; vertical-align: middle;">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="progress-text" style="text-align: center; font-weight: bold; margin-bottom: 0px"></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="progress" style="margin-bottom: 0px;">
                            <div class="progress-bar active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                0%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

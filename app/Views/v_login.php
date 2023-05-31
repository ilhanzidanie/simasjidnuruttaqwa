<!DOCTYPE html>
<?php
$db = \Config\Database::connect();

$web = $db->table('tbl_setting')->get()->getRowArray();

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $web['nama_masjid'] ?> | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="http://localhost/masjid-nuruttaqwa/public/assets/css/login.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline">
            <div class="card-header text-center">
                <a href="<?= base_url() ?>" class="h1">
                    <img src="http://localhost/masjid-nuruttaqwa/public/assets/img/logo.png" alt="logo" width="180px">
                    <!-- <i class="fas fa-mosque fa-2x" style="color: #76ba99;"></i> -->
                    <!-- <h5 class="text-dark"><b><?= $web['nama_masjid'] ?></b></h5> -->
                </a>
            </div>
            <div class="card-body shadow-lg">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert" style="background-color: #76ba99;">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                if (session()->getFlashdata('gagal')) {
                    echo '<div class="alert alert-danger">';
                    echo session()->getFlashdata('gagal');
                    echo '</div>';
                }
                ?>

                <?php echo form_open('Login/CekLogin') ?>
                <p class="text-danger"><?= $validation->hasError('username') ? $validation->getError('username') : '' ?></p>
                <label for="username">Username</label>
                <div class="input-group mb-3">
                    <input name="username" type="text" class="form-control" placeholder="Masukkan Username">
                    <div class="input-group-append">
                    </div>

                </div>
                <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
                <label for="password">Pasword</label>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                    <div class="input-group-append">
                    </div>

                </div>
                <hr>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>
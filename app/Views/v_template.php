<!DOCTYPE html>
<?php
$db = \Config\Database::connect();

$web = $db->table('tbl_setting')->get()->getRowArray();

?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $web['nama_masjid'] ?> | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href=http://localhost/masjid-nuruttaqwa/public/assets/css/style.css>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-light shadow">
            <div class="container">
                <span class="navbar-brand"">
                <img src=" http://localhost/masjid-nuruttaqwa/public/assets/img/logo.png" alt="logo" width="80px">
                    <!-- <i class=" fas fa-mosque fa-2x" style="color: #6F42C1;"></i> -->
                    <!-- <b><?= $web['nama_masjid'] ?></b> -->
                </span>


                <button class="navbar-toggler order-1 order-3 text-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse order-3 justify-content-end text-center" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav p-2">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link text-dark">Home</a>
                        </li>
                        <li class="navi nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-dark">Profile </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow px-3">
                                <li><a href="<?= base_url('Home/Sejarah') ?>" class="dropdown-item nav-link px-3 text-dark">Sejarah</a></li>
                                <li><a href="<?= base_url('Home/Visimisi') ?>" class="dropdown-item nav-link px-3 text-dark">Visi dan Misi</a></li>
                                <li><a href="<?= base_url('Home/Organisasi') ?>" class="dropdown-item nav-link px-3 text-dark">Organisasi</a></li>
                                <li><a href="<?= base_url('Home/Sarana') ?>" class="dropdown-item nav-link px-3 text-dark">Sarana dan Prasarana</a></li>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Home/Agenda') ?>" class="nav-link text-dark">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Home/Kontak') ?>" class="nav-link text-dark">Contact</a>
                        </li>
                    </ul>
                    <div class="theme-switch-wrapper nav-link">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round"></span>
                            <i class="fas fa-moon moon"></i>
                            <i class="fas fa-sun sun"></i> <!-- Ikon untuk mode gelap -->
                        </label>
                    </div>

                </div>


                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0 text-muted"><?= $judul ?></h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $judul ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($page) {
                            echo view($page);
                        }
                        ?>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- Default to the left -->
            <div class="text-center"><strong>Copyright &copy; <?= date('Y') ?></strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>
<script>
    var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    var currentTheme = localStorage.getItem('theme');
    var mainHeader = document.querySelector('.main-header');
    var moonIcon = document.querySelector('.moon');
    var sunIcon = document.querySelector('.sun');

    if (currentTheme) {
        if (currentTheme === 'dark') {
            if (!document.body.classList.contains('dark-mode')) {
                document.body.classList.add("dark-mode");
            }
            if (mainHeader.classList.contains('navbar-light')) {
                mainHeader.classList.add('navbar-dark');
                mainHeader.classList.remove('navbar-light');
            }
            toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            if (!document.body.classList.contains('dark-mode')) {
                document.body.classList.add("dark-mode");
            }
            if (mainHeader.classList.contains('navbar-light')) {
                mainHeader.classList.add('navbar-dark');
                mainHeader.classList.remove('navbar-light');
                moonIcon.style.display = 'inline';
                sunIcon.style.display = 'none';
            }
            localStorage.setItem('theme', 'dark');
        } else {
            if (document.body.classList.contains('dark-mode')) {
                document.body.classList.remove("dark-mode");
            }
            if (mainHeader.classList.contains('navbar-dark')) {
                mainHeader.classList.add('navbar-light');
                mainHeader.classList.remove('navbar-dark');
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'inline';
            }
            localStorage.setItem('theme', 'light');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            icon.style.display = 'none'; // Menghilangkan ikon ketika tombol switch tema dinyalakan
        } else {
            icon.style.display = 'inline'; // Menampilkan kembali ikon ketika tombol switch tema dimatikan
        }
    });
</script>

</html>
<?php
include '../../conf/connection.php'; // koneksi ke database.
session_start();
if (!isset($_SESSION['nama_dokter'])) {
  header("Location: ../login/login_dokter.php");
  exit();
}
$id_dokter = $_SESSION['id_dokter'];
$data = $conn->query("SELECT * FROM dokter WHERE id = '$id_dokter';")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php
    echo (isset($_SESSION['nama_dokter']) || isset($_COOKIE['_logged']) ? 'Beranda | ' . $_SESSION['nama_dokter'] : 'Beranda');
    ?>
  </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php
  if (isset($_POST['edit_profil'])) {
    include("../../conf/connection.php");

    $e_nama = $_POST['nama1'];
    $e_alamat = $_POST['alamat1'];
    $e_no_hp = $_POST['nohp1'];
    $e_email = $_POST['email1'];
    $e_pass = $_POST['pass1'];

    if ($e_pass == null || $e_pass == "" || $e_pass == '') {
      $result = mysqli_query($conn, "UPDATE dokter SET nama='$e_nama', alamat='$e_alamat', no_hp='$e_no_hp', email='$e_email' WHERE id='$id_dokter';");
    } else {
      $result = mysqli_query($conn, "UPDATE dokter SET nama='$e_nama', alamat='$e_alamat', no_hp='$e_no_hp', email='$e_email', password='$e_pass' WHERE id='$id_dokter';");
    }
    header("Location: profil.php");
  }
  ?>

  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <!-- Right navbar dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-th-large"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="../dashboard/db_dokter.php" class="dropdown-item">
              <i class="fa fa-solid fa-house mr-2"></i> Home
            </a>
            <div class="dropdown-divider"></div>
            <a href="../../conf/logout.php" class="dropdown-item">
              <i class="fa fa-solid fa-right-from-bracket mr-2"></i> Logout
            </a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <!--<img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
        <span class="brand-text font-weight-light ml-2">RS Bengkod</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo '' . $_SESSION['nama_dokter']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../dashboard/db_dokter.php" class="nav-link">
                <i class="fa fa-solid fa-dashboard mr-2"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-success">Dokter</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="jadwal_periksa.php" class="nav-link">
                <i class="fa fa-solid fa-stethoscope mr-2"></i>
                <p>
                  Jadwal Periksa
                  <span class="right badge badge-success">Dokter</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pasien.php" class="nav-link">
                <i class="fa fa-solid fa-user mr-2"></i>
                <p>
                  Memeriksa Pasien
                  <span class="right badge badge-success">Dokter</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="riwayat_pasien.php" class="nav-link">
                <i class="fa fa-solid fa-file-waveform mr-2"></i>
                <p>
                  Riwayat Pasien
                  <span class="right badge badge-success">Dokter</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="profil.php" class="nav-link">
                <i class="fa fa-solid fa-house-chimney-medical mr-2"></i>
                <p>
                  Profil
                  <span class="right badge badge-success">Dokter</span>
                </p>
              </a>
            </li>
          </ul>
        </nav> <!-- /.sidebar-menu -->
      </div> <!-- /.sidebar -->
    </aside> <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
      </div> <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Tambah obat form -->
            <div class="col-8">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Edit Profil Anda</h3>
                </div>
                <form method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama1">Nama</label>
                      <input type="text" value="<?php echo $data["nama"]; ?>" class="form-control" name="nama1" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                      <label for="alamat1">Alamat</label>
                      <input type="text" value="<?php echo $data["alamat"]; ?>" class="form-control" name="alamat1" placeholder="Masukkan alamat">
                    </div>
                    <div class="form-group">
                      <label for="nohp1">No HP</label>
                      <input type="text" value="<?php echo $data["no_hp"]; ?>" class="form-control" name="nohp1" placeholder="Masukkan nomor HP">
                    </div>
                    <div class="form-group">
                      <label for="email1">Email</label>
                      <input type="text" value="<?php echo $data["email"]; ?>" class="form-control" name="email1" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                      <label for="pass1">Ganti Password</label>
                      <input type="password" class="form-control" name="pass1" placeholder="Masukkan password">
                    </div>
                  </div>
                  <div style="margin-top:-20px; margin-bottom:10px;" class="card-footer">
                    <button type="submit" name="edit_profil" class="btn btn-success">Edit</button>
                  </div>
                </form>
              </div>
            </div> <!-- /tambah Obat form -->
          </div>
        </div> <!-- /.container-fluid -->
      </section>
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Hamma</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.1
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../plugins/moment/moment.min.js"></script>
  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../dist/js/pages/dashboard.js"></script>
</body>

</html>
<?php
include '../../conf/connection.php'; // koneksi ke database.
session_start();
if (!isset($_SESSION['nama_admin'])) {
  header("Location: ../login/login_admin.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php
    echo (isset($_SESSION['nama_admin']) || isset($_COOKIE['_logged']) ? 'Beranda | ' . $_SESSION['nama_admin'] : 'Beranda');
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
  if (isset($_POST['submit_poli'])) {
    include("../../conf/connection.php");

    $s_nama_poli = $_POST['nama_poli1'];
    $s_keterangan = $_POST['keterangan1'];
    $result = mysqli_query($conn, "INSERT INTO poli(nama_poli,keterangan) VALUES('$s_nama_poli','$s_keterangan')");
    header("Location: poli.php");
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
            <a href="../dashboard/db_admin.php" class="dropdown-item">
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
            <a href="#" class="d-block"><?php echo '' . $_SESSION['nama_admin']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="dokter.php" class="nav-link">
                <i class="fa fa-solid fa-stethoscope mr-2"></i>
                <p>
                  Dokter
                  <span class="right badge badge-danger">Admin</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="fa fa-solid fa-user mr-2"></i>
                <p>
                  Pasien
                  <span class="right badge badge-danger">Admin</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="poli.php" class="nav-link">
                <i class="fa fa-solid fa-house-chimney-medical mr-2"></i>
                <p>
                  Poli
                  <span class="right badge badge-danger">Admin</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="obat.php" class="nav-link">
                <i class="fa fa-solid fa-capsules mr-2"></i>
                <p>
                  Obat
                  <span class="right badge badge-danger">Admin</span>
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
            <div class="col-7">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Tambah Poli</h3>
                </div>
                <form method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_poli1">Nama Poli</label>
                      <input type="text" class="form-control" name="nama_poli1" placeholder="Masukkan nama poli">
                    </div>
                    <div class="form-group">
                      <label for="keterangan1">keterangan</label>
                      <input type="text" class="form-control" name="keterangan1" placeholder="Masukkan keterangan poli">
                    </div>
                  </div>
                  <div style="margin-top:-20px; margin-bottom:10px;" class="card-footer">
                    <button type="submit" name="submit_poli" class="btn btn-success">Tambah</button>
                  </div>
                </form>
              </div>
            </div> <!-- /tambah Obat form -->
            <!-- info obat -->
            <div class="col-lg-4 col-7">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo '' . $conn->query("SELECT * FROM poli")->num_rows; ?></h3>
                  <p>Poli</p>
                </div>
                <div class="icon">
                  <i class="fa fa-solid fa-house-chimney-medical"></i>
                </div>
                <a href="#" class="small-box-footer">Kelola poli dengan seksama!</a>
              </div>
            </div> <!-- /info obat-->
          </div>
          <div class="row">
            <!-- daftar obat -->
            <div class="col-11">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Daftar Poli</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <!--<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>-->
                    </div>
                  </div>
                </div>
                <!-- daftar obat body -->
                <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table style="width:100%" class="table table-head-fixed text-wrap">
                    <thead>
                      <tr>
                        <th style="width:5%">ID</th>
                        <th style="width:20%">Nama Poli</th>
                        <th style="width:40%">Keterangan</th>
                        <th style="width:20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = mysqli_query($conn, "SELECT * FROM poli");
                      while ($poli = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $poli["id"]; ?></td>
                          <td><?php echo $poli["nama_poli"]; ?></td>
                          <td><?php echo $poli["keterangan"]; ?></td>
                          <td>
                            <div class="row">
                              <a style="width:45%; margin:4px;" href='' data-toggle="modal" data-target="#modal<?php echo $poli["id"]; ?>"><button class="btn btn-success btn-block">Edit</button></a>
                              <a style="width:45%; margin:4px;" href='priv/poli_delete.php?id=<?php echo $poli["id"]; ?>'><button class="btn btn-danger btn-block">Hapus</button></a>
                            </div>
                            <!-- edit modal -->
                            <div class="modal fade" id="modal<?php echo $poli["id"]; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit data poli</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="priv/poli_edit.php" method="POST">
                                      <div style="margin-top:-20px;"class="card-body">
                                        <div class="form-group">
                                          <input type="text" hidden value="<?php echo $poli['id']; ?>" class="form-control" name="id2" placeholder="Masukkan nama obat">
                                        </div>
                                        <div class="form-group">
                                          <label for="nama_poli2">Nama poli</label>
                                          <input type="text" value="<?php echo $poli['nama_poli']; ?>" class="form-control" name="nama_poli2" placeholder="Masukkan nama poli">
                                        </div>
                                        <div class="form-group">
                                          <label for="keterangan2">Keterangan</label>
                                          <input type="text" value="<?php echo $poli['keterangan']; ?>" class="form-control" name="keterangan2" placeholder="Masukkan keterangan poli">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                          <button type="submit" name="edit_poli" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- / model body -->
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div> <!-- /daftar obat body -->
              </div>
            </div> <!-- /daftar obat -->
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
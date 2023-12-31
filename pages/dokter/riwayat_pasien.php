<?php
include '../../conf/connection.php';
session_start();
if (!isset($_SESSION['nama_dokter'])) {
  header("Location: ../login/login_dokter.php");
  exit();
}
$id_dokter = $_SESSION['id_dokter'];
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
  if (isset($_POST['submit_jadwal_periksa'])) {
    include("../../conf/connection.php");

    $s_hari = $_POST['hari1'];
    $s_jam_mulai = $_POST['jam_mulai1'];
    $s_jam_selesai = $_POST['jam_selesai1'];
    $result = mysqli_query($conn, "INSERT INTO jadwal_periksa(id_dokter,hari,jam_mulai,jam_selesai) VALUES('$id_dokter','$s_hari','$s_jam_mulai','$s_jam_selesai')");
    header("Location: jadwal_periksa.php");
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
                  <span class="right badge badge-success">dokter</span>
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
            <!-- daftar obat -->
            <div class="col-11">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Riwayat Pasien</h3>
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
                  <table class="table table-head-fixed text-wrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>No. KTP</th>
                        <th>No. HP</th>
                        <th>No. RM</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query = mysqli_query($conn, "SELECT periksa.id AS id_periksa, periksa.biaya_periksa AS bp, daftar_poli.keluhan AS keluhan, periksa.catatan AS catatan, dokter.nama AS nama_dokter, pasien.id AS id_pasien, pasien.nama AS nama_pasien, pasien.alamat AS alamat_pasien, pasien.no_ktp AS no_ktp, pasien.no_hp AS no_hp, pasien.no_rm, periksa.tgl_periksa AS tanggal_periksa FROM pasien JOIN daftar_poli ON pasien.id = daftar_poli.id_pasien JOIN periksa ON daftar_poli.id=periksa.id_daftar_poli JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE daftar_poli.status_periksa = 1 AND dokter.id = '$id_dokter'");
                      while ($pasien = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $pasien["nama_pasien"]; ?></td>
                          <td><?php echo $pasien["nama_dokter"]; ?></td>
                          <td><?php echo $pasien["no_ktp"]; ?></td>
                          <td><?php echo $pasien["no_hp"]; ?></td>
                          <td><?php echo $pasien["no_rm"]; ?></td>
                          <td>
                            <div class="row">
                              <a href='' data-toggle="modal" data-target="#modal<?php echo $pasien['id_pasien']; ?>"><button class="btn btn-success btn-block">Detail</button></a>
                            </div>
                            <div class="modal" id="modal<?php echo $pasien['id_pasien']; ?>">
                              <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Detail Riwayat <?php echo $pasien['nama_pasien'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table style="width:100%" class="table table-head-fixed text-wrap">
                                      <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Tanggal Periksa</th>
                                          <th>Nama Pasien</th>
                                          <th>Nama Dokter</th>
                                          <th>Keluhan</th>
                                          <th>Catatan</th>
                                          <th>Obat</th>
                                          <th>Biaya Periksa</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><?php echo $no; ?></td>
                                          <td><?php echo $pasien["tanggal_periksa"]; ?></td>
                                          <td><?php echo $pasien["nama_pasien"]; ?></td>
                                          <td><?php echo $pasien["nama_dokter"]; ?></td>
                                          <td><?php echo $pasien["keluhan"]; ?></td>
                                          <td><?php echo $pasien["catatan"]; ?></td>
                                          <td>
                                            <?php
                                            $id_periksa = $pasien['id_periksa'];
                                            $query2 = mysqli_query($conn, "SELECT obat.nama_obat AS nama_obat FROM obat JOIN detail_periksa ON detail_periksa.id_obat = obat.id WHERE detail_periksa.id_periksa = '$id_periksa'");
                                            while ($d_obat = mysqli_fetch_array($query2)) {
                                              echo '- ' . $d_obat['nama_obat'] . '<br>';
                                            }
                                            ?>
                                          </td>
                                          <td>Rp<?php echo $pasien["bp"]; ?></td>

                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- / model body -->
                          </td>
                        </tr>
                      <?php
                        $no++;
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
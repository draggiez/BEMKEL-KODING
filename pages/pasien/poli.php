<?php
include '../../conf/connection.php'; // koneksi ke database.
session_start();
if (!isset($_SESSION['nama_pasien'])) {
  header("Location: ../login/login_pasien.php");
  exit();
}
$id_pasien = $_SESSION['id_pasien'];
$no_rm_pasien = $_SESSION['no_rm']
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php
    echo (isset($_SESSION['nama_pasien']) || isset($_COOKIE['_logged']) ? 'Beranda | ' . $_SESSION['nama_pasien'] : 'Beranda');
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
  if (isset($_POST['submit_daftar_poli'])) {
    include("../../conf/connection.php");

    $s_id_jadwal = $_POST['jadwal1'];
    $cek_antrian = $conn->query("SELECT MAX(no_antrian) AS max_num FROM daftar_poli WHERE id_jadwal='$s_id_jadwal'")->fetch_assoc();
    if ($cek_antrian['max_num'] == null || $cek_antrian['max_num'] == 0 || $cek_antrian['max_num'] == "0") {
      $no_antrian = 1;
    } else {
      $no_antrian = $cek_antrian['max_num'] + 1;
    }
    $s_keluhan = $_POST['keluhan1'];
    $result = mysqli_query($conn, "INSERT INTO daftar_poli(id_pasien,id_jadwal,keluhan,no_antrian) VALUES('$id_pasien','$s_id_jadwal','$s_keluhan','$no_antrian')");
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
            <a href="../dashboard/db_pasien.php" class="dropdown-item">
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
            <a href="#" class="d-block"><?php echo '' . $_SESSION['nama_pasien']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../dashboard/db_pasien.php" class="nav-link">
                <i class="fa fa-solid fa-stethoscope mr-2"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-primary">Pasien</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pasien/poli.php" class="nav-link">
                <i class="fa fa-solid fa-user mr-2"></i>
                <p>
                  Poli
                  <span class="right badge badge-primary">Pasien</span>
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
            <div class="col-4">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Daftar Poli</h3>
                </div>
                <form method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="no_rm1">Nomor Rekam Medis</label>
                      <input disabled type="text" value="<?php echo $_SESSION['no_rm']; ?>" class="form-control" placeholder="Masukkan hari">
                      <input hidden type="text" value="<?php echo $_SESSION['no_rm']; ?>" class="form-control" name="no_rm1" placeholder="Masukkan hari">
                    </div>
                    <div class="form-group">
                      <label for="pol1">Poli</label>
                      <select class="custom-select form-control-border" id='poli1' name="poli1">
                        <option value="999">Pilih poli</option>
                        <?php
                        $r_poli = $conn->query("SELECT * FROM poli");
                        while ($d_poli = mysqli_fetch_array($r_poli, MYSQLI_ASSOC)) :;
                        ?>
                          <option value="<?php echo $d_poli["id"]; ?>">
                            <?php echo $d_poli["nama_poli"]; ?>
                          </option>
                        <?php
                        endwhile;
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="jadwal1">Pilih Jadwal</label>
                      <select class="custom-select form-control-border" id='jadwal_1' name="jadwal1">
                        <option value="999">Pilih poli dahulu</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="keluhan1">Keluhan</label>
                      <input type="text" class="form-control" name="keluhan1" placeholder="Masukkan keluhan anda">
                    </div>
                  </div>
                  <div style="margin-top:-20px; margin-bottom:10px;" class="card-footer">
                    <button type="submit" name="submit_daftar_poli" class="btn btn-success">Tambah</button>
                  </div>
                </form>
              </div>
            </div> <!-- /tambah Obat form -->
            <!-- info obat -->
            <div class="col-8">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Riwayat Daftar Poli</h3>
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
                        <th>No</th>
                        <th style="width:15%">Poli</th>
                        <th style="width:30%">Dokter</th>
                        <th style="width:10%">Hari</th>
                        <th style="width:10%">Mulai</th>
                        <th style="width:10%">Selesai</th>
                        <th style="width:10%">Antrian</th>
                        <th style="width:50%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query = mysqli_query($conn, "SELECT 
                      a.nama AS nama_dokter, 
                      b.hari AS hari, 
                      b.jam_mulai AS jm, 
                      b.jam_selesai AS js, 
                      c.no_antrian AS no_antri,
                      d.nama_poli AS nama_poli
                      FROM dokter AS a 
                      JOIN jadwal_periksa AS b 
                      ON a.id = b.id_dokter 
                      JOIN daftar_poli AS c 
                      ON c.id_jadwal = b.id 
                      JOIN poli AS d
                      ON a.id_poli = d.id
                      WHERE c.id_pasien = 3;");
                      while ($jadwal = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $jadwal["nama_poli"]; ?></td>
                          <td><?php echo $jadwal["nama_dokter"]; ?></td>
                          <td><?php echo $jadwal["hari"]; ?></td>
                          <td><?php echo $jadwal["jm"]; ?></td>
                          <td><?php echo $jadwal["js"]; ?></td>
                          <td><?php echo $jadwal["no_antri"]; ?></td>
                          <td>
                            <div class="row">
                              <a href='' data-toggle="modal" data-target="#modal<?php echo $jadwal["no_antri"]; ?>"><button style="width:100%; padding:5px; font-size:14px;"class="btn btn-success btn-block">Detail</button></a>
                            </div>
                            <!-- edit modal -->
                            <div class="modal fade" id="modal<?php echo $jadwal["no_antri"]; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Detail Poli</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="priv/obat_edit.php" method="POST">
                                      <div class="card-body">
                                        <div style="margin-top:-20px;" class="form-group">
                                          <label>Nama Poli</label>
                                          <p><?php echo $jadwal["nama_poli"]; ?></p>
                                        </div>
                                        <div class="form-group">
                                          <label>Nama Dokter</label>
                                          <p><?php echo $jadwal["nama_dokter"]; ?></p>
                                        </div>
                                        <div class="form-group">
                                          <label>Hari</label>
                                          <p><?php echo $jadwal["hari"]; ?></p>
                                        </div>
                                        <div class="form-group">
                                          <label>Mulai</label>
                                          <p><?php echo $jadwal["jm"]; ?></p>
                                        </div>
                                        <div class="form-group">
                                          <label>Selesai</label>
                                          <p><?php echo $jadwal["js"]; ?></p>
                                        </div>
                                        <div style="margin-bottom:-15px;" class="form-group">
                                          <label>Nomor Antrian</label>
                                          <div class="col-2 btn btn-success btn-block"><?php echo $jadwal["no_antri"]; ?></div>
                                        </div>
                                      </div>
                                    </form>
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
            </div> <!-- /info obat-->
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
  <script>
    document.getElementById('poli1').addEventListener('change', function() {
      var id_poli = this.value;
      loadjadwal(id_poli);
    });
    //document.getElementById('jadwal_1').innerHTML = '<option>ASU</option>';

    function loadjadwal(id_poli) {
      var xhr = new XMLHttpRequest();
      //console.log(id_poli);

      xhr.open('GET', 'http://127.0.0.1/rs_bengkod/pages/pasien/priv/jadwal_poli.php?id_poli=' + id_poli, true);
      xhr.setRequestHeader('Content-Type', 'text/html');
      xhr.onload = function() {
        if (xhr.status == 200) {
          console.log(xhr.responseText);
          document.getElementById('jadwal_1').innerHTML = xhr.responseText;
        } else {
          document.getElementById('jadwal_1').innerHTML = '<option>ERR</option>';
        }
      };
      xhr.send();
    };
  </script>
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
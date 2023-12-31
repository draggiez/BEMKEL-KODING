<?php
include 'conf/connection.php'; // koneksi ke database.
session_start();
if (isset($_SESSION['nama_admin'])) {
  header('Location: pages/dashboard/db_admin.php');
  exit();
}
if (isset($_SESSION['nama_dokter'])) {
  header('Location: pages/dashboard/db_dokter.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Sakit Bengkod: Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<div class="login-logo">
  Selamat Datang di Website<br><b>Rumah Sakit Bengkod</b>
</div>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk Sebagai</p>
        <div class="row">
          <div class="col-4">
            <a href="pages/login/login_admin.php">
              <button type="button" class="btn btn-danger btn-block">
                <i class="fa fa-solid fa-user-check"></i> Admin
              </button>
            </a>
          </div>
          <div class="col-4">
            <a href="pages/login/login_dokter.php">
              <button type="button" class="btn btn-success btn-block">
                <i class="fa fa-solid fa-stethoscope"></i> Dokter
              </button>
            </a>
          </div>
          <div class="col-4">
            <a href="pages/login/login_pasien.php">
              <button type="button" class="btn btn-primary btn-block">
                <i class="fa fa-solid fa-hospital-user"></i> Pasien
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="social-auth-links text-center mt-0">
        <p class="mb-1">
          Belum punya akun pasien?<a href="pages/register/register_pasien.php" class="text-center"> Daftar Disini.</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
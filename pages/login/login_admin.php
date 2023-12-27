<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Sakit Bengkod: Login</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <?php
  include '../../conf/connection.php'; // koneksi ke database.
  session_start();
  if (isset($_SESSION['nama_admin'])) {
    header('Location: ../dashboard/db_admin.php');
    exit();
  }
  if (isset($_POST['submit'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
      echo '<b>Warning!</b> Silahkan isi semua data yang diperlukan.';
    } elseif (count((array) $conn->query('SELECT email FROM admin WHERE email = "' . $email . '"')->fetch_array()) == 0) {
      echo '<b>Warning!</b> Email tidak terdaftar.';
    } else {
      $result = $conn->query("SELECT * FROM admin WHERE email='$email' AND password='$password'");
      if ($result->num_rows == 1) {
        $admin = $conn->query("SELECT nama_admin FROM admin WHERE email='$email'")->fetch_assoc();
        $_SESSION['nama_admin'] = $admin['nama_admin'];
        if (!isset($_COOKIE['is_logged'])) {
          /**
           * Atur cookie selama 1 hari.
           * Rumus: 60 * 60 * 24 = 1 hari.
           */
          setcookie('_logged', rand(1, 10000), time() + (60 * 60 * 24), '/');
        }
        header('Location: ../dashboard/db_admin.php'); // Alihkan ke halaman index.
        exit();
      }
    }
  }
  ?>
  <div class="login-box">
    <div class="login-logo">
      <b>Admin</b><br> Rumah Sakit Bengkod
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masukkan email dan password.</p>
        <form method="POST">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Ingat Saya
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button class="btn btn-primary btn-block" type="submit" name="submit">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
  </div>
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
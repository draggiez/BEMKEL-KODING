<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Sakit Bengkod: Register</title>
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
  if (isset($_SESSION['nama_pasien'])) {
    header('Location: ../dashboard/db_pasien.php');
    exit();
  }
  if (isset($_POST['submit'])) {
    $nama    = $_POST['nama'];
    $alamat    = $_POST['alamat'];
    $no_ktp   = $_POST['no_ktp'];
    $no_hp    = $_POST['no_hp'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $cek_email = $conn->query("SELECT * FROM pasien WHERE email='$email'");
    $cek_ktp = $conn->query("SELECT * FROM pasien WHERE no_ktp='$no_ktp'");
    $cek_no_rm = $conn->query("SELECT MAX(SUBSTRING(no_rm, 8)) AS last_queue_number FROM pasien")->fetch_assoc();
    $no_terakhir = $cek_no_rm['last_queue_number'];
    $no_terakhir = $no_terakhir ? $no_terakhir : 0;

    $tahun_bulan = date("Ym");
    $nomor_antri = $no_terakhir + 1;
    $no_rm = $tahun_bulan . '-' . str_pad($nomor_antri, 3, "0", STR_PAD_LEFT);

    if ($cek_email->num_rows == 1) {
      echo '<b>Warning!</b> Email sudah terdaftar.';
    } elseif ($cek_ktp->num_rows == 1) {
      echo '<b>Warning!</b> KTP sudah terdaftar.';
    } else {
      if (empty($email) || empty($password)) {
        echo '<b>Warning!</b> Silahkan isi semua data yang diperlukan.';
      } else {
        $reg = mysqli_query($conn, "INSERT INTO pasien(nama,alamat,no_ktp,no_hp,no_rm,email,password) VALUES('$nama','$alamat','$no_ktp', '$no_hp', '$no_rm','$email', '$password')");
        header('Location: ../login/login_pasien.php'); // Alihkan ke halaman login.
        exit();
      }
    }
  }
  ?>
  <div class="login-box">
    <div class="login-logo">
      <b>Pasien</b><br> Rumah Sakit Bengkod
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan isi data berikut.</p>
        <form method="POST">
          <div class="input-group mb-3">
            <input required type="text" name="nama" class="form-control" placeholder="Nama lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="text" name="alamat" class="form-control" placeholder="Alamat">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="text" name="no_ktp" class="form-control" placeholder="Nomor KTP">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="text" name="no_hp" class="form-control" placeholder="Nomor HP">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="password" name="password" class="form-control" placeholder="Password">
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
              <button class="btn btn-primary btn-block" type="submit" name="submit">Daftar</button>
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
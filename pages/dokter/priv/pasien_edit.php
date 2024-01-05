<?php
include("../../../conf/connection.php");
session_start();
if (!isset($_SESSION['nama_dokter'])) {
    header("Location: ../login/login_dokter.php");
    exit();
}
$id_dokter = $_SESSION['id_dokter'];
$id_daftar_poli = $_GET['id'];
$cek_id_periksa = $conn->query("SELECT id FROM periksa WHERE id_daftar_poli = '$id_daftar_poli'")->fetch_assoc();
$id_periksa = $cek_id_periksa['id'];

$pasien = $conn->query("SELECT periksa.catatan AS catatan, periksa.tgl_periksa AS tgl_periksa, a.id AS id_daftar_poli, b.nama AS nama_pasien FROM daftar_poli AS a JOIN pasien AS b ON a.id_pasien = b.id JOIN periksa ON periksa.id_daftar_poli = a.id WHERE a.id = '$id_daftar_poli';")->fetch_assoc();
$daftar_obat = $conn->query("SELECT * FROM obat;");
$daftar_obat2 = $conn->query("SELECT obat.id AS id_o FROM obat JOIN detail_periksa ON obat.id = detail_periksa.id_obat WHERE detail_periksa.id_periksa = '$id_periksa';");

$biaya_periksa = 150000;
$total_biaya = 0;

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
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
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link href="../../../dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
    if (isset($_POST['submit'])) {
        include("../../../conf/connection.php");

        $total_biaya_obat = 0;
        $s_id_daftar_poli = $id_daftar_poli;
        $s_tanggal_periksa = $_POST['tanggal1'];
        $s_catatan = $_POST['catatan1'];
        $s_obat = $_POST['obat'];
        $id_obat = [];
        for ($i = 0; $i < count($s_obat); $i++) {
            $data_obat = explode('|', $s_obat[$i]);
            $id_obat[] = $data_obat[0];
            $total_biaya_obat += $data_obat[1];
        }

        $total_biaya = $biaya_periksa + $total_biaya_obat;

        $update_periksa = $conn->query("UPDATE periksa SET
                                        tgl_periksa = '$s_tanggal_periksa', 
                                        catatan = '$s_catatan' ,
                                        biaya_periksa = '$total_biaya'
                                        WHERE
                                        id_daftar_poli='$id_daftar_poli'");



        $delete = $conn->query("DELETE FROM detail_periksa WHERE id_periksa = '$id_periksa'");
        for ($j = 0; $j < count($id_obat); $j++) {
            $insert_detail_periksa = $conn->query("INSERT INTO 
                                         detail_periksa(id_periksa,id_obat)
                                         VALUES
                                         ('$id_periksa', '$id_obat[$j]');");
        }

        $set_status = $conn->query("UPDATE daftar_poli SET status_periksa='1' WHERE id = '$id_daftar_poli'");
        header("Location: ../pasien.php");
    }
    ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
                        <a href="../../dashboard/db_dokter.php" class="dropdown-item">
                            <i class="fa fa-solid fa-house mr-2"></i> Home
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="../../../conf/logout.php" class="dropdown-item">
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
                        <img src="../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo '' . $_SESSION['nama_dokter']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../../dashboard/db_dokter.php" class="nav-link">
                                <i class="fa fa-solid fa-dashboard mr-2"></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-success">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../jadwal_periksa.php" class="nav-link">
                                <i class="fa fa-solid fa-stethoscope mr-2"></i>
                                <p>
                                    Jadwal Periksa
                                    <span class="right badge badge-success">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pasien.php" class="nav-link">
                                <i class="fa fa-solid fa-user mr-2"></i>
                                <p>
                                    Memeriksa Pasien
                                    <span class="right badge badge-success">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../riwayat_pasien.php" class="nav-link">
                                <i class="fa fa-solid fa-file-waveform mr-2"></i>
                                <p>
                                    Riwayat Pasien
                                    <span class="right badge badge-success">Dokter</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../profil.php" class="nav-link">
                                <i class="fa fa-solid fa-house-chimney-medical mr-2"></i>
                                <p>
                                    Profil
                                    <span class="right badge badge-success">Dokter</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
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
                        <div class="col-11">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Pasien</h3>
                                </div>
                                <form method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_pasien1">Nama Pasien</label>
                                            <input disabled value="<?php echo $pasien['nama_pasien']; ?>" class="form-control">
                                            <input hidden value="<?php echo $pasien['nama_pasien']; ?>" class="form-control" name="nama_pasien1">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal1">Tanggal Periksa</label>
                                            <input type="datetime-local" value="<?php echo $pasien['tgl_periksa']; ?>" class="form-control" name="tanggal1">
                                        </div>
                                        <div class="form-group">
                                            <label for="catatan1">Catatan</label>
                                            <input type="text" class="form-control" name="catatan1" placeholder="Masukkan catatan" value="<?php echo $pasien['catatan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="obat">Obat</label>
                                            <select class="form-control" name="obat[]" multiple id='id_obat'>
                                                <?php while ($obat = mysqli_fetch_assoc($daftar_obat)) {
                                                    mysqli_data_seek($daftar_obat2, 0); ?>
                                                    <?php while ($cek = mysqli_fetch_assoc($daftar_obat2)) { ?>
                                                        <?php
                                                        if ($obat['id'] == $cek['id_o']) {
                                                            $sel = true;
                                                            break;
                                                        } else {
                                                            $sel = false;
                                                        }
                                                        ?>
                                                    <?php } ?>
                                                    <?php if ($sel) { ?>
                                                        <option selected="selected" value="<?php echo $obat['id']; ?>|<?php echo $obat['harga']; ?>"><?php echo $obat['nama_obat']; ?> | Rp<?php echo $obat['harga']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $obat['id']; ?>|<?php echo $obat['harga']; ?>"><?php echo $obat['nama_obat']; ?> | Rp<?php echo $obat['harga']; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="total">Total Biaya</label>
                                            <input type="text" value="" class="form-control" id="total">
                                        </div>
                                    </div>
                                    <div style="margin-top:-20px; margin-bottom:10px;" class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-success">Edit</button>
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
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../../../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../../plugins/moment/moment.min.js"></script>
    <script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../../dist/js/pages/dashboard.js"></script>
    <!-- Select2 -->
    <script>
        $(document).ready(function() {
            $('#id_obat').select2();
            var x = $('#id_obat').select2().val();
            var total = 150000;
            for (var j = 0; j < x.length; j++) {
                var part = x[j].split('|');
                total += parseFloat(part[1]);
            }
            $('#total').val(total);
            $('#id_obat').on('change.select2', function(e) {
                var selectedValueArray = $(this).val();
                total = 150000;
                if (selectedValueArray) {
                    for (var i = 0; i < selectedValueArray.length; i++) {
                        var parts = selectedValueArray[i].split('|');
                        if (parts.length == 2) {
                            total += parseFloat(parts[1]);
                        }
                    }
                }
                $('#total').val(total);
            });
        });
    </script>
    <script src="../../../dist/js/select2.min.js"></script>
</body>

</html>
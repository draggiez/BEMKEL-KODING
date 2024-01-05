<?php
	include("../../../conf/connection.php");

	if(isset($_POST['edit_pasien'])) {
		$e_id = $_POST['id2'];
		$e_nama_pasien = $_POST['nama_pasien2'];
    	$e_alamat = $_POST['alamat2'];
    	$e_no_ktp = $_POST['no_ktp2'];
		$e_no_hp = $_POST['no_hp2'];
    	$e_email = $_POST['email2'];
    	$result = mysqli_query($conn, "UPDATE pasien SET nama = '$e_nama_pasien', alamat = '$e_alamat', no_ktp= '$e_no_ktp', no_hp= '$e_no_hp', email = '$e_email' WHERE id='$e_id'");
		header("Location: ../pasien.php");
	}
?>
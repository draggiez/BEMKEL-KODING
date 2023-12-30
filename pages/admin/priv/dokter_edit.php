<?php
	include("../../../conf/connection.php");

	if(isset($_POST['edit_dokter'])) {
		$e_id = $_POST['id2'];
		$e_nama_dokter = $_POST['nama_dokter2'];
    	$e_alamat = $_POST['alamat2'];
    	$e_no_hp = $_POST['no_hp2'];
    	$e_email = $_POST['email2'];
    	$e_poli = $_POST['poli2'];
		$result = mysqli_query($conn, "UPDATE dokter SET nama = '$e_nama_dokter', alamat = '$e_alamat', no_hp= '$e_no_hp', email = '$e_email', id_poli='$e_poli' WHERE id='$e_id'");
		header("Location: ../dokter.php");
	}
?>
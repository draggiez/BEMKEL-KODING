<?php
	include("../../../conf/connection.php");

	if(isset($_POST['edit_poli'])) {
		$e_id = $_POST['id2'];
		$e_nama_poli = $_POST['nama_poli2'];
    	$e_keterangan = $_POST['keterangan2'];
		$result = mysqli_query($conn, "UPDATE poli SET nama_poli = '$e_nama_poli', keterangan = '$e_keterangan' WHERE id='$e_id'");
		header("Location: ../poli.php");
	}
?>
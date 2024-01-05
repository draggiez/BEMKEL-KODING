<?php
	include("../../../conf/connection.php");

	if(isset($_POST['edit_jadwal'])) {
		$e_id = $_POST['id_jad2'];
		$e_hari = $_POST['hari2'];
		$e_jm = $_POST['jam_mulai2'];
		$e_js = $_POST['jam_selesai2'];
		$result = mysqli_query($conn, "UPDATE jadwal_periksa SET hari = '$e_hari', jam_mulai = '$e_jm', jam_selesai= '$e_js' WHERE id='$e_id'");
		echo $result;
		header("Location: ../jadwal_periksa.php");
	}
?>
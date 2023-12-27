<?php
	include("../../../conf/connection.php");

	if(isset($_POST['edit_obat'])) {
		$e_id = $_POST['id2'];
		$e_nama_obat = $_POST['nama_obat2'];
		$e_kemasan = $_POST['kemasan2'];
		$e_harga = $_POST['harga2'];
		$result = mysqli_query($conn, "UPDATE obat SET nama_obat = '$e_nama_obat', kemasan = '$e_kemasan', harga= '$e_harga' WHERE id='$e_id'");
		header("Location: ../obat.php");
	}
?>
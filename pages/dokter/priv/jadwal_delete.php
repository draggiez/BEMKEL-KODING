<?php
	include("../../../conf/connection.php");
	
 	$id = $_GET['id'];
	$result = mysqli_query($conn, "DELETE FROM jadwal_periksa WHERE id=$id");
	header("Location:../periksa.php");
?>
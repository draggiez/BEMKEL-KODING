<?php
	include("../../../conf/connection.php");
	
 	$id = $_GET['id'];
	$result = mysqli_query($conn, "DELETE FROM pasien WHERE id=$id");
	header("Location:../pasien.php");
?>
<?php
	include("../../../conf/connection.php");
	
 	$id = $_GET['id'];
	$result = mysqli_query($conn, "DELETE FROM dokter WHERE id=$id");
	header("Location:../dokter.php");
?>
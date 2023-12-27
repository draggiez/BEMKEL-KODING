<?php
	include("../../../conf/connection.php");
	
 	$id = $_GET['id'];
	$result = mysqli_query($conn, "DELETE FROM obat WHERE id=$id");
	header("Location:../obat.php");
?>
<?php
	include("../../../conf/connection.php");
	
 	$id = $_GET['id'];
	$result = mysqli_query($conn, "DELETE FROM poli WHERE id=$id");
	header("Location:../poli.php");
?>
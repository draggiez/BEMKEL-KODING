<?php
$servername = "localhost"; // assuming the database is hosted on the same server as the PHP script
$username = "root"; // replace with your actual database username
$password = ""; // replace with your actual database password
$dbname = "rs_root";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
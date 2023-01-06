<?php
date_default_timezone_set("Asia/Kolkata");
$servername = "localhost";
$username = "root";
$password = "";
$database = "sareehouse";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";
?>
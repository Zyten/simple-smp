<?php

$host="localhost"; // Host name
$username="root"; // Database username
$password=""; // Database password
$db_name="uthm_smp"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select db
mysqli_select_db($conn,$db_name)or die("cannot select DB");

?>

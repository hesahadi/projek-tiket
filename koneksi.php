<?php
// Define database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "projek";

// Create database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
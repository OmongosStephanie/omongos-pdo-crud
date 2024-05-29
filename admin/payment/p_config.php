<?php
// Database configuration
/*
$servername = "localhost";
$username = "root";
$password = "";
$database = "luna";
*/
$servername = "localhost";
$username = "u593341949_dev_omongos";
$password = "20212048Omongos";
$database = "u593341949_db_omongos";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

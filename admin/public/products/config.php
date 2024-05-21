<?php

$host = 'localhost';
$dbname = 'luna';
$username = 'root';
$password = '';
/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u593341949_dev_omongos');
define('DB_PASSWORD', '20212048Omongos');
define('DB_NAME', 'u593341949_db_omongos');
*/
try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}
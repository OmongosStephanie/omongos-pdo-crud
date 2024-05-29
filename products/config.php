<?php
$host = 'localhost';
$dbname = 'u593341949_db_omongos';
$username = 'u593341949_dev_omongos';
$password = '20212048Omongos';
/*
$host = 'localhost';
$dbname = 'luna';
$username = 'root';
$password = '';
*/
try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}
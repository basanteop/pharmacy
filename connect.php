<?php
// db_connect.php
$host = 'localhost';
$db = 'pharmacy_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}
?>
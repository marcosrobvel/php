<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'miranda_backend_sql';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
<?php
// Conexion
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'register';
$port = 3306;

$db = mysqli_connect($server, $username, $password, $database, $port);
mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesion
if (!isset($_SESSION)) {
    session_start();
}
?>
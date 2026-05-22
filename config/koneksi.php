<?php
// config/koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "projek"; // Sesuaikan dengan nama database di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
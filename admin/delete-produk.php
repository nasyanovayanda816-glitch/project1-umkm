<?php
include 'config/koneksi.php';
$id = $_GET['id'] ?? 0;

// Hapus gambar dulu jika ada
$result = mysqli_query($conn,"SELECT foto FROM produk WHERE id_produk=$id");
$row = mysqli_fetch_assoc($result);
if($row['foto'] && file_exists("assets/img/".$row['foto'])){
    unlink("assets/img/".$row['foto']);
}

// Hapus data produk
mysqli_query($conn,"DELETE FROM produk WHERE id_produk=$id");
header("Location: products.php");
exit;
?>
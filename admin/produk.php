<?php

session_start();

include 'config/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM produk");

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="wrapper">

<?php include 'includes/sidebar.php'; ?>

<main class="main">

<?php $pageTitle = "Produk";?>

<?php include 'includes/topbar.php'; ?>

<div class="table-card">

<div class="table-header">

<h5>Data Produk</h5>

<a href="add-produk.php" class="btn btn-primary">
Tambah Produk
</a>

</div>

<table class="table align-middle">

<thead>
<tr>
<th>No</th>
<th>Foto</th>
<th>Nama Produk</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no = 1; ?>

<?php while($row = mysqli_fetch_assoc($data)) : ?>

<tr>

<td><?= $no++; ?></td>

<td>

<?php if($row['foto']) : ?>

<img
src="assets/img/<?= $row['foto']; ?>"
width="70"
class="rounded">

<?php endif; ?>

</td>

<td><?= $row['nama_produk']; ?></td>

<td>
Rp <?= number_format($row['harga']); ?>
</td>

<td><?= $row['stok']; ?></td>

<td>

<a
href="edit-produk.php?id=<?= $row['id_produk']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="delete-produk.php?id=<?= $row['id_produk']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus produk ini?')">

Hapus

</a>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</main>

</div>

</body>
</html>
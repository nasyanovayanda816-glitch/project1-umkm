<?php

session_start();

include 'config/koneksi.php';

$page = "produk.php";

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

<?php $pageTitle = "Produk"; ?>
<?php include 'includes/topbar.php'; ?>

<div class="table-card produk-card">

    <div class="table-header">

        <div>
            <h3 class="produk-heading">
                Data Produk
            </h3>

            <p class="produk-subtitle">
                Kelola semua produk snack & catering
            </p>
        </div>

        <a href="add-produk.php" class="btn-tambah-produk">

            <i class="fa fa-plus"></i>
            Tambah Produk

        </a>

    </div>

    <div class="table-responsive">

        <table class="table produk-table">

            <thead>

            <tr>

            <th>No</th>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>

            </tr>

</thead>

            <tbody>

            <?php $no = 1; ?>

            <?php while($row = mysqli_fetch_assoc($data)) : ?>

                <tr>

                    <!-- NO -->
                    <td>
                        <?= $no++; ?>
                    </td>

                    <!-- FOTO -->
                    <td>

                    <?php if($row['foto']) : ?>

                        <img
                        src="assets/img/<?= $row['foto']; ?>"
                        class="produk-img">

                    <?php endif; ?>

                    </td>

                <!-- NAMA PRODUK -->
                <td>

                <div class="produk-title">
                <?= $row['nama_produk']; ?>
                </div>

                </td>

                    <!-- HARGA -->
                    <td>

                        <strong class="harga-text">

                            Rp <?= number_format($row['harga']); ?>

                        </strong>

                    </td>

                    <!-- KATEGORI -->
                    <td>

                    <?php if($row['kategori'] == 'Snack') : ?>

                        <span class="badge-snack">
                            Snack
                        </span>

                    <?php else : ?>

                        <span class="badge-catering">
                            Catering
                        </span>

                    <?php endif; ?>

                    </td>

                    <!-- STOK -->
                    <td>

                        <span class="stok-box">

                            <?= $row['stok']; ?>

                        </span>

                    </td>
                    <!-- DESKRIPSI -->
                    <td>

                    <div class="produk-deskripsi">

                    <?= $row['deskripsi']; ?>

                    </div>

                    </td>
                    <!-- AKSI -->
                    <td>

                        <div class="aksi-produk">

                            <a
                            href="edit-produk.php?id=<?= $row['id_produk']; ?>"
                            class="btn-edit-mini">

                                <i class="fa fa-pen"></i>

                            </a>

                            <a
                            href="delete-produk.php?id=<?= $row['id_produk']; ?>"
                            class="btn-delete-mini"
                            onclick="return confirm('Hapus produk ini?')">

                                <i class="fa fa-trash"></i>

                            </a>

                        </div>

                    </td>

                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>
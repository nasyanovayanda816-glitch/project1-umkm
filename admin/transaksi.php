<?php

session_start();
include 'config/koneksi.php';

$page = "transaksi.php";

$query = mysqli_query($conn, "
    SELECT * FROM pesanan
    ORDER BY id_pesanan DESC
");

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Transaksi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="wrapper">

<?php include 'includes/sidebar.php'; ?>

<main class="main">

<?php $pageTitle = "Transaksi"; ?>
<?php include 'includes/topbar.php'; ?>

<div class="transaksi-container">

    <div class="transaksi-header">

        <div>
            <h2>
<i class="fa fa-cart-shopping"></i>
Data Transaksi
</h2>
            <p>Kelola semua transaksi pelanggan</p>
        </div>

    </div>

    <!-- FILTER -->
    <div class="filter-box">

        <form method="GET">

            <div class="filter-grid">

                <div>
                    <label>Tanggal Dari</label>
                    <input type="date" name="dari">
                </div>

                <div>
                    <label>Tanggal Ke</label>
                    <input type="date" name="ke">
                </div>

                <div>
                    <label>Pencarian</label>
                    <input
                    type="text"
                    name="search"
                    placeholder="Cari pelanggan / invoice">
                </div>

                <button type="submit">
                    <i class="fa fa-filter"></i>
                    Terapkan
                </button>

            </div>

        </form>

    </div>

    <!-- TABLE -->
    <div class="table-card transaksi-modern-card">

        <table class="table transaksi-table">

            <thead>

                <tr>

                    <th>NO. INV</th>
                    <th>PELANGGAN</th>
                    <th>STATUS BAYAR</th>
                    <th>STATUS PESANAN</th>
                    <th>TOTAL</th>
                    <th>AKSI</th>

                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($query)) : ?>

                <tr>

                    <td>

                    <div class="invoice-number">
                        #INV-<?= $row['id_pesanan']; ?>
                    </div>

                    <div class="invoice-date">
                        <?= date('d/m/Y'); ?>
                    </div>

                    </td>

                    <td>
                        <?= $row['nama_pelanggan']; ?>
                    </td>

                    <td>

                        <?php if($row['status_pembayaran'] == 'Lunas') : ?>

                            <span class="badge-lunas">
                                Lunas
                            </span>

                        <?php else : ?> 

                            <span class="badge-belum">
                                Belum Bayar
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <span class="badge-proses">
                            <?= $row['status']; ?>
                        </span>

                    </td>

                    <td class="total-harga">
                        Rp <?= number_format($row['total_harga']); ?>
                    </td>

                    <td>

                        <div class="aksi-btn">

                            <a href="#">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="#">
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

</main>

</div>

</body>
</html>
<?php

session_start();
include 'config/koneksi.php';

$page = "laporan.php";
$pageTitle = "Laporan";

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Laporan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="assets/style.css?v=10">

</head>

<body>

<div class="wrapper">

<?php include 'includes/sidebar.php'; ?>

<main class="main">

<?php include 'includes/topbar.php'; ?>

<div class="laporan-container">

    <!-- HEADER -->
    <div class="laporan-top">

        <div class="laporan-title">

            <h2>
                <i class="fa fa-chart-column"></i>
                Laporan Penjualan
            </h2>

        </div>

        <div class="laporan-export">

            <a href="export-pdf.php" class="btn-pdf">
                <i class="fa fa-file-pdf"></i>
                PDF
            </a>

            <a href="#" class="btn-excel">
                <i class="fa fa-file-excel"></i>
                Excel
            </a>

        </div>

    </div>

    <!-- FILTER -->
    <div class="laporan-filter-card">

        <form>

            <div class="laporan-filter-grid">

                <div>
                    <label>Tanggal Mulai</label>
                    <input type="date">
                </div>

                <div>
                    <label>Tanggal Akhir</label>
                    <input type="date">
                </div>

                <button type="submit">

                    <i class="fa fa-filter"></i>
                    Terapkan Filter

                </button>

            </div>

        </form>

    </div>

    <!-- TABLE -->
    <div class="laporan-table-card">

        <table class="table laporan-table">

            <thead>

                <tr>

                    <th>TANGGAL</th>
                    <th>JUMLAH TRANSAKSI</th>
                    <th>TOTAL OMZET MASUK (RP)</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td colspan="3" class="empty-laporan">

                        Tidak ada transaksi masuk pada rentang tanggal tersebut.

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

</main>

</div>

</body>
</html>
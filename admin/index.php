<?php
session_start();
include 'config/koneksi.php';

// Data Card
$totalProduk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk"));
$totalPelanggan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE role='pelanggan'"));

// Omset Hari Ini
$omsetHariIni = 0;
$today = date('Y-m-d');
$queryOmset = mysqli_query($conn, "SELECT SUM(total_harga) as omset FROM pesanan WHERE DATE(created_at) = '$today'");
if($queryOmset){
    $dataOmset = mysqli_fetch_assoc($queryOmset);
    $omsetHariIni = $dataOmset['omset'] ?? 0;
}

// Pesanan Proses
$queryProses = mysqli_query($conn, "SELECT COUNT(*) as total_proses FROM pesanan WHERE status='proses'");
$dataProses = mysqli_fetch_assoc($queryProses);
$totalProses = $dataProses['total_proses'] ?? 0;

// Omzet 7 Hari Terakhir
$omzet7Hari = [];
$labels7Hari = [];
for($i=6;$i>=0;$i--){
    $date = date('Y-m-d', strtotime("-$i days"));
    $labels7Hari[] = date('d M', strtotime($date));

    $query = mysqli_query($conn, "SELECT SUM(total_harga) as total FROM pesanan WHERE DATE(created_at) = '$date'");
    $data = mysqli_fetch_assoc($query);
    $omzet7Hari[] = $data['total'] ?? 0;
}

// Transaksi Terbaru (limit 10)
$transaksi = mysqli_query($conn, "
    SELECT p.id_pesanan, p.invoice, u.nama AS pelanggan, pr.nama_produk,
           p.status, p.total_harga, p.created_at
    FROM pesanan p
    JOIN users u ON p.id_user = u.id_user
    JOIN produk pr ON p.id_produk = pr.id_produk
    ORDER BY p.created_at DESC
    LIMIT 10
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="wrapper">

<?php include 'includes/sidebar.php'; ?>
<main class="main">
<?php $pageTitle = "Dashboard"; ?>
<?php include 'includes/topbar.php'; ?>

<!-- Cards -->
<div class="row g-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card blue">
            <div>
                <h6>Total Produk</h6>
                <h2><?= $totalProduk; ?></h2>
            </div>
            <i class="fa fa-box icon"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card green">
            <div>
                <h6>Total Pelanggan</h6>
                <h2><?= $totalPelanggan; ?></h2>
            </div>
            <i class="fa fa-users icon"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card orange">
            <div>
                <h6>Omset Hari Ini</h6>
                <h2>Rp <?= number_format($omsetHariIni); ?></h2>
            </div>
            <i class="fa fa-wallet icon"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card red">
            <div>
                <h6>Pesanan Diproses</h6>
                <h2><?= $totalProses; ?></h2>
            </div>
            <i class="fa fa-spinner icon"></i>
        </div>
    </div>
</div>

<!-- Omzet Chart -->
<div class="chart-card mt-4">
  <div class="chart-header">
    <h5>Omzet 7 Hari Terakhir</h5>
  </div>
  <canvas id="omzetChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('omzetChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($labels7Hari); ?>,
        datasets: [{
            label: 'Omzet',
            data: <?= json_encode($omzet7Hari); ?>,
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.2)',
            fill: true,
            tension: 0.3,
            borderWidth: 3
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});
</script>

<!-- Transaksi Terbaru -->
<div class="table-card mt-4">
  <div class="table-header">
    <h5>Transaksi Terbaru</h5>
  </div>
  <table class="table align-middle table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Invoice</th>
        <th>Pelanggan</th>
        <th>Produk</th>
        <th>Status Pesanan</th>
        <th>Total</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($transaksi)): ?>
      <tr>
        <td><?= $row['invoice']; ?></td>
        <td><?= $row['pelanggan']; ?></td>
        <td><?= $row['nama_produk']; ?></td>
        <td><?= ucfirst($row['status']); ?></td>
        <td>Rp <?= number_format($row['total_harga']); ?></td>
        <td><?= date('d M Y', strtotime($row['created_at'])); ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</main>
</div>
</body>
</html>
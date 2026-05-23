<?php
session_start();
include 'config/koneksi.php';

// Ambil filter dari form
$tanggalDari = $_GET['tanggal_dari'] ?? '';
$tanggalKe   = $_GET['tanggal_ke'] ?? '';
$cari        = $_GET['cari'] ?? '';

// Query dasar
$query = "
SELECT p.invoice, u.nama AS pelanggan, pr.nama_produk, p.jumlah_produk,
       p.status_pembayaran, p.status AS status_pengerjaan,
       p.total_harga
FROM pesanan p
JOIN users u ON p.id_user = u.id_user
JOIN produk pr ON p.id_produk = pr.id_produk
WHERE 1=1
";

// Tambahkan filter tanggal
if($tanggalDari && $tanggalKe){
    $query .= " AND DATE(p.created_at) BETWEEN '$tanggalDari' AND '$tanggalKe'";
}

// Tambahkan pencarian
if($cari){
    $query .= " AND (u.nama LIKE '%$cari%' OR pr.nama_produk LIKE '%$cari%' OR p.invoice LIKE '%$cari%')";
}

$query .= " ORDER BY p.created_at DESC";

$transaksi = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Transaksi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container mt-4">
    <h3>Data Transaksi</h3>

    <!-- Filter -->
    <form method="get" class="row g-3 mb-3">
        <div class="col-md-3">
            <input type="date" name="tanggal_dari" class="form-control" value="<?= $tanggalDari ?>" placeholder="Tanggal Dari">
        </div>
        <div class="col-md-3">
            <input type="date" name="tanggal_ke" class="form-control" value="<?= $tanggalKe ?>" placeholder="Ke">
        </div>
        <div class="col-md-4">
            <input type="text" name="cari" class="form-control" value="<?= $cari ?>" placeholder="Cari Pelanggan/Produk/Invoice">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Terapkan Filter</button>
        </div>
    </form>

    <!-- Tabel Transaksi -->
    <div class="table-card">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No. Invoice</th>
                    <th>Pelanggan</th>
                    <th>Produk</th>
                    <th>Status Bayar</th>
                    <th>Status Pengerjaan</th>
                    <th>Sisa Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($transaksi)): ?>
                <tr>
                    <td><?= $row['invoice'] ?></td>
                    <td><?= $row['pelanggan'] ?></td>
                    <td><?= $row['nama_produk'] ?> (<?= $row['jumlah_produk'] ?> pcs)</td>
                    <td>
                        <?php if($row['status_pembayaran'] == 'lunas'): ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Belum Bayar</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php
                        $status = strtolower($row['status_pengerjaan']);
                        $badgeClass = ($status=='selesai') ? 'bg-success' : (($status=='proses') ? 'bg-warning' : 'bg-primary');
                        ?>
                        <span class="badge <?= $badgeClass ?>"><?= ucfirst($status) ?></span>
                    </td>
                    <td>Rp <?= number_format($row['total_harga']); ?></td>
                    <td>
                        <a href="lihat-pesanan.php?id=<?= $row['id_pesanan'] ?>" class="text-primary me-2"><i class="fa fa-eye"></i></a>
                        <a href="hapus-pesanan.php?id=<?= $row['id_pesanan'] ?>" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php if(mysqli_num_rows($transaksi) == 0): ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
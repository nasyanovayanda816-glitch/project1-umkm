<?php

session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login.php");
    exit();
}

$nama = $_SESSION['nama'];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Customer</title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/pembayaran.css">

</head>
    
<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <h2>JajananGenz.</h2>
        </div>

        <ul class="menu">

            <li class="<?= basename($_SERVER['PHP_SELF']) == 'index.user.php' ? 'active' : ''; ?>">
        <a href="index.user.php">
            <i class="fa-solid fa-house"></i>
            Produk
        </a>
    </li>

    <li class="<?= basename($_SERVER['PHP_SELF']) == 'pesanan.php' ? 'active' : ''; ?>">
        <a href="pesanan.php">
            <i class="fa-solid fa-bag-shopping"></i>
            Pesanan
        </a>
    </li>

    <li class="<?= basename($_SERVER['PHP_SELF']) == 'favorit.php' ? 'active' : ''; ?>">
        <a href="#">
            <i class="fa-solid fa-heart"></i>
            Favorit
        </a>
    </li>

    <li class="<?= basename($_SERVER['PHP_SELF']) == 'chat.php' ? 'active' : ''; ?>">
        <a href="#">
            <i class="fa-solid fa-message"></i>
            Chat
        </a>
    </li>

    <li class="<?= basename($_SERVER['PHP_SELF']) == 'riwayat.php' ? 'active' : ''; ?>">
        <a href="#">
            <i class="fa-solid fa-clock-rotate-left"></i>
            Riwayat
        </a>
    </li>

    <li class="<?= basename($_SERVER['PHP_SELF']) == 'pembayaran.php' ? 'active' : ''; ?>">
        <a href="pembayaran.php">
            <i class="fa-solid fa-wallet"></i>
            Pembayaran
        </a>
    </li>

    <li class="<?= basename($_SERVER['PHP_SELF']) == 'pengaturan.php' ? 'active' : ''; ?>">
        <a href="#">
            <i class="fa-solid fa-gear"></i>
            Pengaturan
        </a>
    </li>
    <li class="<?= basename($_SERVER['PHP_SELF']) == 'logout.php' ? 'active' : ''; ?>">
        <a href="../auth/logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
        Keluar
        </a>
    </li>

        </ul>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">

            <h2>Halo, <?= $nama; ?> 👋</h2>

            <div class="profile-icon">
                <i class="fa-solid fa-user"></i>
            </div>

        </div>

        <!-- TITLE -->
        <div class="section-title">

            <h3>Pembayaran</h3>

        </div>

        <!-- PAYMENT CARDS -->
        <div class="payment-cards">

            <div class="payment-card pink">

                <h4>Total Tagihan</h4>

                <h1>Rp 870.000</h1>

                <p>Semua tagihan bulan ini</p>

            </div>

            <div class="payment-card">

                <h4>Sudah Dibayar</h4>

                <h1>Rp 550.000</h1>

                <p>Pembayaran berhasil</p>

            </div>

            <div class="payment-card">

                <h4>Belum Dibayar</h4>

                <h1>Rp 320.000</h1>

                <p>Menunggu pembayaran</p>

            </div>

        </div>

        <!-- PAYMENT LIST -->
        <div class="payment-list">

            <div class="list-header">

                <h3>Daftar Tagihan</h3>

            </div>

            <div class="payment-item">

                <div class="payment-info">

                    <h4>Paket Ulang Tahun</h4>

                    <p>20 Pax • Catering Premium</p>

                </div>

                <div class="payment-price">
                    Rp 550.000
                </div>

                <div class="status success">
                    Lunas
                </div>

            </div>

            <div class="payment-item">

                <div class="payment-info">

                    <h4>Snack Box Meeting</h4>

                    <p>15 Pax • Snack Box</p>

                </div>

                <div class="payment-price">
                    Rp 320.000
                </div>

                <div class="status pending">
                    Pending
                </div>

            </div>

        </div>

        <!-- PAYMENT METHOD -->
        <div class="payment-method">

            <h3>Metode Pembayaran</h3>

            <div class="method-grid">

                <div class="method-card">

                    <i class="fa-solid fa-building-columns"></i>

                    <h4>Transfer Bank</h4>

                    <p>BCA - 123456789</p>

                </div>

                <div class="method-card" onclick="openQRIS()">

             <i class="fa-solid fa-qrcode"></i>

             <h4>QRIS</h4>

                <p>Pembayaran cepat QR</p>

                </div>
                <div class="method-card">

                    <i class="fa-solid fa-wallet"></i>

                    <h4>E-Wallet</h4>

                    <p>DANA / OVO / GoPay</p>

                </div>

            </div>
            <!-- MODAL QRIS -->
        <div class="qris-modal" id="qrisModal">

    <div class="qris-content">

        <span class="close-btn" onclick="closeQRIS()">
            &times;
        </span>

        <h2>Scan QRIS</h2>

        <img src="..admin/assets/img/1779447475_40c1caad79a1345a2c50bdd1d3b08aca.jpg" alt="QRIS">

        <p>Silakan scan QR untuk pembayaran</p>

    </div>

    </div>

    <script>

    function openQRIS() {
        document.getElementById("qrisModal").style.display = "flex";
    }

    function closeQRIS() {
        document.getElementById("qrisModal").style.display = "none";
    }

    window.onclick = function(e) {

        let modal = document.getElementById("qrisModal");

        if (e.target == modal) {
            modal.style.display = "none";
        }
    }

</script>

</body>
</html>

        </div>

        <!-- UPLOAD -->
        <div class="upload-box">

            <h3>Upload Bukti Pembayaran</h3>

            <form>

                <input type="file">

                <button type="submit">
                    Upload Sekarang
                </button>

            </form>

        </div>

    </main>

</div>

</body>
</html>
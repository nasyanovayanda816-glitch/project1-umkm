<?php 
session_start();
global $conn;
if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login.php");
    exit();
}

include '../config/koneksi.php';

$nama = $_SESSION['nama'];

/* =========================
   FILTER KATEGORI
========================= */

$kategori = isset($_GET['kategori']) 
    ? $_GET['kategori'] 
    : 'semua';

/* =========================
   QUERY PRODUK
========================= */

if($kategori == 'semua'){

    $query = "SELECT * FROM produk ORDER BY id_produk DESC";

} else {

    $query = "SELECT * FROM produk 
              WHERE kategori='$kategori'
              ORDER BY id_produk DESC";
}

$queryProduk = mysqli_query($conn, $query);

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
    <link rel="stylesheet" href="../assets/css/index.user.css">

</head>

<body>

<!-- =========================
        NAVBAR
========================= -->

<div class="dashboard">

    <!-- =========================
            SIDEBAR
    ========================= -->

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

    <!-- =========================
            MAIN CONTENT
    ========================= -->

    <main class="main-content">

        <!-- TOPBAR -->

        <div class="topbar">

            <div>
                <h2>Halo, <?= $nama; ?> 👋</h2>
            </div>

            <div class="topbar-right">

                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input 
                        type="text" 
                        placeholder="Cari menu catering..."
                    >

                </div>

                <div class="icons">

                    <i class="fa-regular fa-bell"></i>
                
                    

                </div>

                <div class="profile-icon">
                    <i class="fa-solid fa-user"></i>
                </div>

            </div>

        </div>

        <!-- =========================
                BANNER
        ========================= -->

        <div class="banner">

            <img 
                src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200" 
                alt=""
            >

            <div class="banner-content">

                <h2>
                    Diskon Catering <br>
                    Hingga 20%
                </h2>

                <p>
                    Khusus pemesanan acara ulang tahun & gathering.
                </p>

            </div>

        </div>

        <!-- =========================
                KATEGORI
        ========================= -->

        <div class="section-title">

            <h3>Kategori Menu</h3>

            <a href="#">
                Lihat Semua
            </a>

        </div>

        <div class="categories">

            <!-- SEMUA -->

            <a href="index.user.php?kategori=semua"
               class="category <?= ($kategori == 'semua') ? 'active' : ''; ?>">

                <i class="fa-solid fa-layer-group"></i>
                <span>Semua</span>

            </a>

            <!-- SNACK -->

            <a href="index.user.php?kategori=snack"
               class="category <?= ($kategori == 'snack') ? 'active' : ''; ?>">

                <i class="fa-solid fa-cake-candles"></i>
                <span>Snack</span>

            </a>

            <!-- CATERING -->

            <a href="index.user.php?kategori=catering"
               class="category <?= ($kategori == 'catering') ? 'active' : ''; ?>">

                <i class="fa-solid fa-burger"></i>
                <span>Catering</span>

            </a>

        </div>

        <!-- =========================
                PRODUK
        ========================= -->

        <div class="section-title">

            <h3>Menu Favorit</h3>

            <a href="#">
                Lihat Semua
            </a>

        </div>

        <div class="food-grid">

            <?php while($produk = mysqli_fetch_assoc($queryProduk)) : ?>

            <div class="food-card">

                <div class="food-image">

                    <img 
                        src="../admin/assets/img/<?php echo $produk['foto']; ?>" 
                        alt="<?php echo $produk['nama_produk']; ?>"
                    >

                    <span class="discount">

                        <?php 
                        echo !empty($produk['kategori']) 
                        ? $produk['kategori'] 
                        : 'Menu'; 
                        ?>

                    </span>

                </div>

                <div class="food-info">

                    <div>

                        <h4>
                            <?= $produk['nama_produk']; ?>
                        </h4>

                        <p>
                            Rp <?= number_format($produk['harga'],0,',','.'); ?>
                        </p>

                    </div>

                    <button>+</button>

                </div>

            </div>

            <?php endwhile; ?>

        </div>

    </main>

</div>

</body>
</html>
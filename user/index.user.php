<?php 
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login.php");
    exit();
}

$nama = $_SESSION['nama'];
?>

  <link rel="stylesheet" href="assets/css/index.user.css">
<!DOCTYPE html>
<html lang="id">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Dashboard UMKM Catering</title>

  <!-- GOOGLE FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
  >

  <!-- FONT AWESOME -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
  >

  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/index.user.css">

</head>

<body>
    <!-- NAVBAR TOP -->
<nav class="top-navbar">

    <div class="nav-logo">
        FlavorVibe.
    </div>

    <ul class="nav-menu">

        <li><a href="#">Beranda</a></li>
        <li><a href="#">Catalog</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="../auth/login.php">Login</a></li>

    </ul>

</nav>


<div class="dashboard">

  <!-- SIDEBAR -->
  <aside class="sidebar">

    <div class="logo">
      <h2>JajananGenz.</h2>
    </div>

    <ul class="menu">

      <li class="active">
        <i class="fa-solid fa-house"></i>
        Dashboard
      </li>

      <li>
        <i class="fa-solid fa-bag-shopping"></i>
        Pesanan
      </li>

      <li>
        <i class="fa-solid fa-heart"></i>
        Favorit
      </li>

      <li>
        <i class="fa-solid fa-message"></i>
        Chat Pelanggan
      </li>

      <li>
        <i class="fa-solid fa-clock-rotate-left"></i>
        Riwayat
      </li>

      <li>
        <i class="fa-solid fa-wallet"></i>
        Pembayaran
      </li>

      <li>
        <i class="fa-solid fa-gear"></i>
        Pengaturan
      </li>

    </ul>

    <!-- PROMO -->
    <div class="upgrade-box">

      <h3>
        Upgrade akun kamu <br>
        dan dapat voucher catering gratis 🎉
      </h3>

      <button>Upgrade Sekarang</button>

    </div>

  </aside>

  <!-- MAIN -->
  <main class="main-content">

    <!-- TOPBAR -->
    <div class="topbar">

      <div>
        <h2>Halo, <?php echo $nama; ?> 👋</h2>
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
          <i class="fa-regular fa-envelope"></i>
          <i class="fa-regular fa-heart"></i>

        </div>

        <img
          src="https://i.pravatar.cc/100"
          alt=""
        >

      </div>

    </div>

    <!-- BANNER -->
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

    <!-- KATEGORI -->
    <div class="section-title">

      <h3>Kategori Menu</h3>

      <a href="#">
        Lihat Semua
      </a>

    </div>

    <div class="categories">

      <div class="category active">

        <i class="fa-solid fa-cake-candles"></i>

        <span>Snack</span>

      </div>

      <div class="category">

        <i class="fa-solid fa-burger"></i>

        <span>Burger</span>

      </div>

      <div class="category">

        <i class="fa-solid fa-mug-hot"></i>

        <span>Minuman</span>

      </div>

      <div class="category">

        <i class="fa-solid fa-drumstick-bite"></i>

        <span>Ayam</span>

      </div>

      <div class="category">

        <i class="fa-solid fa-pizza-slice"></i>

        <span>Pizza</span>

      </div>

      <div class="category">

        <i class="fa-solid fa-ice-cream"></i>

        <span>Dessert</span>

      </div>

    </div>

    <!-- PRODUK -->
    <div class="section-title">

      <h3>Menu Favorit</h3>

      <a href="#">
        Lihat Semua
      </a>

    </div>

    <div class="food-grid">

      <!-- CARD -->
      <div class="food-card">

        <div class="food-image">

          <img
            src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1000"
            alt=""
          >

          <span class="discount">
            Diskon 15%
          </span>

        </div>

        <div class="food-info">

          <div>

            <h4>Burger Viral</h4>

            <p>Rp 25.000</p>

          </div>

          <button>+</button>

        </div>

      </div>

      <!-- CARD -->
      <div class="food-card">

        <div class="food-image">

          <img
            src="https://images.unsplash.com/photo-1512058564366-18510be2db19?q=80&w=1000"
            alt=""
          >

          <span class="discount">
            Diskon 10%
          </span>

        </div>

        <div class="food-info">

          <div>

            <h4>Rice Bowl Gen Z</h4>

            <p>Rp 30.000</p>

          </div>

          <button>+</button>

        </div>

      </div>

      <!-- CARD -->
      <div class="food-card">

        <div class="food-image">

          <img
            src="https://images.unsplash.com/photo-1528735602780-2552fd46c7af?q=80&w=1000"
            alt=""
          >

          <span class="discount">
            Diskon 20%
          </span>

        </div>

        <div class="food-info">

          <div>

            <h4>Toast Mozarella</h4>

            <p>Rp 18.000</p>

          </div>

          <button>+</button>

        </div>

      </div>

    </div>

  </main>

  <!-- RIGHTBAR -->
  <aside class="rightbar">

    <!-- SALDO -->
    <div class="balance-card">

      <p>Saldo UMKM</p>

      <h2>Rp 12JT</h2>

      <div class="balance-buttons">

        <button>Top Up</button>

        <button>Transfer</button>

      </div>

    </div>

    <!-- ALAMAT -->
    <div class="address-card">

      <h4>Alamat Pengiriman</h4>

      <p>
        📍 Bandar Lampung, Indonesia
      </p>

      <button>Ubah Alamat</button>

    </div>

    <!-- PESANAN -->
    <div class="order-card">

      <h3>Pesanan Hari Ini</h3>

      <div class="order-item">

        <img
          src="https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=400"
          alt=""
        >

        <div>

          <h4>Pizza Gen Z</h4>

          <p>Rp 55.000</p>

        </div>

      </div>

      <div class="order-item">

        <img
          src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=400"
          alt=""
        >

        <div>

          <h4>Burger Viral</h4>

          <p>Rp 25.000</p>

        </div>

      </div>

      <div class="total">

        <span>Total</span>

        <strong>Rp 202.000</strong>

      </div>

      <button class="checkout">
        Checkout Sekarang
      </button>

    </div>

  </aside>

</div>

</body>
</html>
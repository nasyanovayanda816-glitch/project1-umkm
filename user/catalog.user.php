<?php
session_start();
include '../config/koneksi.php';
include '../config/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login.php");
    exit();
}

$nama = $_SESSION['nama'];

$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'semua';

if($kategori == 'semua'){
    $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
}else{
    $query = mysqli_query($conn, "SELECT * FROM produk WHERE kategori='$kategori' ORDER BY id_produk DESC");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Catalog Menu</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
<link rel="stylesheet" href="../assets/css/catalog.user.css">

</head>
<body>

<div class="dashboard">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="profile">

            <div class="profile-circle">
                <?= strtoupper(substr($nama,0,1)); ?>
            </div>

            <h2><?= $nama; ?></h2>

            <p>Pelanggan Catering</p>

        </div>

        <div class="menu">

            <a href="index.user.php">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>

            <a href="pesanan.php">
                <i class="fa-solid fa-bag-shopping"></i>
                Pesanan
            </a>

            <a href="catalog.user.php" class="active">
                <i class="fa-solid fa-heart"></i>
                Catalog
            </a>

            <a href="#">
                <i class="fa-solid fa-wallet"></i>
                Pembayaran
            </a>

            <a href="#">
                <i class="fa-solid fa-gear"></i>
                Pengaturan
            </a>

        </div>

    </aside>

    <!-- CONTENT -->

    <div class="content">

        <!-- TOPBAR -->

        <div class="topbar">

            <div>
                <h1>Halo, <?= $nama; ?> 👋</h1>
                <p>Temukan menu terbaik favoritmu</p>
            </div>

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari menu catering...">
            </div>

        </div>

        <!-- FILTER -->

        <div class="filter-menu">

            <a href="?kategori=semua"
            class="<?= $kategori == 'semua' ? 'active' : ''; ?>">
            Semua
            </a>

            <a href="?kategori=snack"
            class="<?= $kategori == 'snack' ? 'active' : ''; ?>">
            Snack
            </a>

            <a href="?kategori=catering"
            class="<?= $kategori == 'catering' ? 'active' : ''; ?>">
            Catering
            </a>

            <a href="?kategori=makanan basah"
            class="<?= $kategori == 'makanan basah' ? 'active' : ''; ?>">
            Makanan Basah
            </a>

        </div>

        <!-- PRODUK -->

        <div class="catalog-grid">

        <?php while($produk = mysqli_fetch_assoc($query)) : ?>

            <?php
            $gambar = !empty($produk['gambar'])
                ? "../uploads/".$produk['gambar']
                : "https://via.placeholder.com/400x300?text=No+Image";
            ?>

            <div class="card">

                <div class="card-image">

                    <img src="<?= $gambar; ?>" alt="">

                    <div class="label">
                        <?= $produk['kategori']; ?>
                    </div>

                </div>

                <div class="card-body">

                    <div class="rating">
                        ⭐⭐⭐⭐⭐ (4.9)
                    </div>

                    <h3><?= $produk['nama_produk']; ?></h3>

                    <p class="deskripsi">
                        <?= $produk['deskripsi']; ?>
                    </p>

                    <div class="harga">
                        Rp <?= number_format($produk['harga']); ?>
                    </div>

                    <div class="action">

                        <button class="btn"
                        onclick="toggleForm(<?= $produk['id_produk']; ?>)">
                        Pesan
                        </button>

                        <div class="favorite">
                            <i class="fa-regular fa-heart"></i>
                        </div>

                    </div>

                    <?php if($produk['kategori'] == 'catering') : ?>

                    <form class="form-catering"
                    id="form<?= $produk['id_produk']; ?>">

                        <input type="text"
                        placeholder="Nama Acara">

                        <input type="date">

                        <input type="number"
                        placeholder="Jumlah Porsi">

                        <textarea rows="4"
                        placeholder="Catatan tambahan"></textarea>

                        <button type="submit">
                            Kirim Pesanan
                        </button>

                    </form>

                    <?php endif; ?>

                </div>

            </div>

        <?php endwhile; ?>

        </div>

    </div>

</div>

<script>

function toggleForm(id){

    let form = document.getElementById('form'+id);

    if(form){

        if(form.style.display === 'flex'){
            form.style.display = 'none';
        }else{
            form.style.display = 'flex';
        }

    }

}

</script>

</body>
</html>
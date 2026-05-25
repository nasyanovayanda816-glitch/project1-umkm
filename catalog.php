<?php
include 'config/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Catalog Produk</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="assets/css/catalog.css">

</head>

<body>

<!-- HEADER COMPONENT -->
<?php include 'components/header.php'; ?>
<?php include 'components/navbar.php'; ?>

<!-- HEADER -->

<section class="header">

    <div class="breadcrumb">
        <i class="fa-solid fa-house"></i> Beranda > Produk
    </div>

    <h1 class="title">Produk</h1>

    <p class="subtitle">
        Jelajahi koleksi produk berkualitas tinggi kami yang dikurasi
        dengan cermat untuk memenuhi kebutuhan Anda.
    </p>

</section>

<!-- SEARCH -->

<section class="search-wrapper">

    <div class="search-box">

        <div class="search-left">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari produk...">
        </div>

        <div class="search-right">

            <button class="filter-btn">
                <i class="fa-solid fa-grip"></i>
            </button>

            <select class="sort">
                <option>Terbaru</option>
                <option>Termurah</option>
                <option>Termahal</option>
            </select>

        </div>

    </div>

</section>

<!-- CONTENT -->

<section class="content">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="filter-header">
            <h3>Filter</h3>
            <a href="#" class="reset">Hapus Semua</a>
        </div>

        <div class="category">

            <h4>Kategori</h4>

            <div class="check-group">

                <label class="check-item">
                    <input type="checkbox">
                    Snack
                    <span class="badge">4</span>
                </label>

                <label class="check-item">
                    <input type="checkbox">
                    Catering
                    <span class="badge">6</span>
                </label>

                <label class="check-item">
                    <input type="checkbox">
                    Makanan Basah
                    <span class="badge">3</span>
                </label>

            </div>

        </div>

    </aside>

    <!-- PRODUK -->

    <div class="products">

        <div class="product-grid">

            <?php while($produk = mysqli_fetch_assoc($query)) : ?>

            <div class="card">

                <div class="card-image">

                    <img src="../admin/assets/img/<?php echo $produk['foto']; ?>">

                    <div class="quick-view">
                        Tampilan Cepat
                    </div>

                </div>

                <div class="card-body">

                    <div class="category-text">
                        <?php echo $produk['kategori']; ?>
                    </div>

                    <h2 class="product-title">
                        <?php echo $produk['nama_produk']; ?>
                    </h2>

                    <p class="desc">
                        <?php echo $produk['deskripsi']; ?>
                    </p>

                    <div class="rating">
                        ⭐⭐⭐⭐⭐ (4.9)
                    </div>

                    <div class="price">
                        Rp <?php echo number_format($produk['harga'],0,',','.'); ?>
                    </div>

                    <button class="detail-btn">
                        <i class="fa-regular fa-eye"></i>
                        Lihat Rincian
                    </button>

                </div>

            </div>

            <?php endwhile; ?>

        </div>

    </div>

</section>

<!-- FOOTER -->

<footer class="footer">

    <div class="footer-container">

        <div>

            <div class="footer-logo">FlavorVibe.</div>

            <p>
                Mitra terpercaya Anda dalam menemukan produk
                sempurna dengan tema FnB modern.
            </p>

        </div>

    </div>

</footer>

</body>
</html>
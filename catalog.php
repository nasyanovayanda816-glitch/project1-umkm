<?php ?>

<?php include 'components/header.php'; ?>
  <link rel="stylesheet" href="assets/css/catalog.css">
</head>

<body>

  <!-- =========================
        HERO SECTION
  ========================== -->

  <?php include 'components/navbar.php'; ?>



  <?php include 'components/footer.php'; ?>


<main class="content-container">
        
        <header class="section-header">
            <div class="header-left">
                <h1 class="main-title">Hidangan Unggulan</h1>
                <p class="subtitle">Cicipi hidangan paling populer kami, disiapkan dengan cermat untuk kepuasan Anda.</p>
            </div>
            <div class="header-arrows">
                <button class="arrow-btn btn-prev">&#8592;</button>
                <button class="arrow-btn btn-next">&#8594;</button>
            </div>
        </header>

        <section class="menu-grid">
            
            <article class="menu-card">
                <div class="card-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=500&auto=format&fit=crop&q=80" alt="Steak Wagyu Signature">
                </div>
                <div class="card-content">
                    <div class="price-container">
                        <span class="current-price">Rp 299.000</span>
                        <span class="old-price">Rp 350.000</span>
                    </div>
                    <h3 class="item-title">Steak Wagyu Signature</h3>
                    <p class="item-description">Steak wagyu premium dipanggang sempurna</p>
                </div>
            </article>

            <article class="menu-card">
                <div class="card-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500&auto=format&fit=crop&q=80" alt="Paket Keluarga Lengkap">
                </div>
                <div class="card-content">
                    <div class="price-container">
                        <span class="current-price">Rp 189.000</span>
                        <span class="old-price">Rp 220.000</span>
                    </div>
                    <h3 class="item-title">Paket Keluarga Lengkap</h3>
                    <p class="item-description">Paket makan sempurna untuk seluruh keluarga</p>
                </div>
            </article>

            <article class="menu-card">
                <div class="card-image-wrapper show-overlay">
                    <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&auto=format&fit=crop&q=80" alt="Paket Caramel Latte">
                    <div class="quick-view-overlay">
                        <span class="quick-view-btn">Tampilan Cepat</span>
                    </div>
                </div>
                <div class="card-content">
                    <div class="price-container">
                        <span class="current-price">Rp 79.000</span>
                        <span class="old-price">Rp 95.000</span>
                    </div>
                    <h3 class="item-title">Paket Caramel Latte &...</h3>
                    <p class="item-description">Pasangan dessert sempurna untuk pecinta kopi</p>
                </div>
            </article>

            <article class="menu-card">
                <div class="card-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop&q=80" alt="Smoothie Tropis Segar">
                </div>
                <div class="card-content">
                    <div class="price-container">
                        <span class="current-price">Rp 39.000</span>
                        <span class="old-price">Rp 45.000</span>
                    </div>
                    <h3 class="item-title">Smoothie Tropis Segar</h3>
                    <p class="item-description">Smoothie sehat dari buah tropis segar</p>
                </div>
            </article>

        </section>

        <footer class="action-footer">
            <a href="#" class="btn-more">Lihat Hidangan Lainnya &rarr;</a>
        </footer>

    </main>

</body>
</html>
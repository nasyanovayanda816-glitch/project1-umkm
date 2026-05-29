<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Riwayat Pesanan</title>

<!-- GOOGLE FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- ICON -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<link rel="stylesheet" href="../assets/css/riwayat.css">

</head>
<body>

<!-- =========================
     SIDEBAR
========================= -->

<div class="sidebar">

    <div class="logo">
        JajananGenz.
    </div>

    <div class="sidebar-menu">

        <a href="#">
            <i class="fa-solid fa-house"></i>
            Produk
        </a>

        <a href="#">
            <i class="fa-solid fa-bag-shopping"></i>
            Pesanan
        </a>

        <a href="#">
            <i class="fa-solid fa-heart"></i>
            Favorit
        </a>

        <a href="#">
            <i class="fa-solid fa-comments"></i>
            Chat
        </a>

        <a href="#" class="active">
            <i class="fa-solid fa-clock-rotate-left"></i>
            Riwayat
        </a>

        <a href="#">
            <i class="fa-solid fa-wallet"></i>
            Pembayaran
        </a>

        <a href="#">
            <i class="fa-solid fa-gear"></i>
            Pengaturan
        </a>

        <a href="#">
            <i class="fa-solid fa-right-from-bracket"></i>
            Keluar
        </a>

    </div>

</div>

<!-- =========================
     MAIN
========================= -->

<div class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <h1>
            Halo, dodo 👋
        </h1>

        <div class="profile">
            <i class="fa-solid fa-user"></i>
        </div>

    </div>

    <!-- TITLE -->

    <h1 style="font-size:45px; margin-bottom:30px;">
        Riwayat Pesanan
    </h1>

    <!-- STAT -->

    <div class="stats">

        <div class="card active">
            <h3>Total Pesanan</h3>
            <h1>12</h1>
            <p>Semua riwayat pesanan</p>
        </div>

        <div class="card">
            <h3>Pesanan Selesai</h3>
            <h1>9</h1>
            <p>Pesanan berhasil diterima</p>
        </div>

        <div class="card">
            <h3>Dibatalkan</h3>
            <h1>3</h1>
            <p>Pesanan yang dibatalkan</p>
        </div>

    </div>

    <!-- HISTORY -->

    <div class="history-box">

        <div class="history-header">

            <h2>Daftar Riwayat</h2>

            <div class="filter">
                <button class="btn-active">Semua</button>
                <button>Selesai</button>
                <button>Pending</button>
            </div>

        </div>

        <!-- ITEM 1 -->

        <div class="history-item">

            <div class="left">

                <div class="image">
                    <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=800&auto=format&fit=crop">
                </div>

                <div class="detail">

                    <h3>Paket Ulang Tahun</h3>

                    <p>20 Pax • Catering Premium</p>

                    <p>20 Mei 2026</p>

                    <div class="invoice">
                        INV-2026-001
                    </div>

                </div>

            </div>

            <div class="right">

                <div class="price">
                    Rp 550.000
                </div>

                <div class="status success">
                    Selesai
                </div>

            </div>

        </div>

        <!-- ITEM 2 -->

        <div class="history-item">

            <div class="left">

                <div class="image">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800&auto=format&fit=crop">
                </div>

                <div class="detail">

                    <h3>Snack Box Meeting</h3>

                    <p>15 Pax • Snack Box</p>

                    <p>18 Mei 2026</p>

                    <div class="invoice">
                        INV-2026-002
                    </div>

                </div>

            </div>

            <div class="right">

                <div class="price">
                    Rp 320.000
                </div>

                <div class="status pending">
                    Pending
                </div>

            </div>

        </div>

        <!-- ITEM 3 -->

        <div class="history-item">

            <div class="left">

                <div class="image">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=800&auto=format&fit=crop">
                </div>

                <div class="detail">

                    <h3>Paket Gathering</h3>

                    <p>50 Pax • Buffet Family</p>

                    <p>15 Mei 2026</p>

                    <div class="invoice">
                        INV-2026-003
                    </div>

                </div>

            </div>

            <div class="right">

                <div class="price">
                    Rp 1.200.000
                </div>

                <div class="status cancel">
                    Dibatalkan
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
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

    <title>Detail Pesanan - FlavorVibe</title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     <link rel="stylesheet" href="../assets/css/pesanan.css">

</head>

<body>

<!-- NAVBAR -->
<nav class="top-navbar">

    <div class="nav-logo">
        FlavorVibe.
    </div>

    <ul class="nav-menu">

         <li><a href="index.user.php">Produk</a></li>
        <li><a href="../index.php">Beranda</a></li>
        <li><a href="../catalog.php">Catalog</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="../auth/logout.php">Logout</a></li>


    </ul>

</nav>

<!-- CONTAINER -->
<div class="orders-container">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="profile-box">

            <div class="profile-circle">
                <?php echo strtoupper(substr($nama,0,1)); ?>
            </div>

            <h3><?php echo $nama; ?></h3>

            <p>Pelanggan Catering</p>

        </div>

        <ul class="menu">

  <li>
    <a href="index.user.php">
      <i class="fa-solid fa-house"></i>
      Prodak
    </a>
  </li>

  <li>
    <a href="pesanan.php">
      <i class="fa-solid fa-bag-shopping"></i>
      Pesanan
    </a>
  </li>

  <li>
    <a href="#">
      <i class="fa-solid fa-heart"></i>
      Favorit
    </a>
  </li>

  <li>
    <a href="#">
      <i class="fa-solid fa-message"></i>
      Chat
    </a>
  </li>

  <li>
    <a href="#">
      <i class="fa-solid fa-clock-rotate-left"></i>
      Riwayat
    </a>
  </li>

  <li>
    <a href="#">
      <i class="fa-solid fa-wallet"></i>
      Pembayaran
    </a>
  </li>

  <li>
    <a href="#">
      <i class="fa-solid fa-gear"></i>
      Pengaturan
    </a>
  </li>

</ul>

    </aside>

    <!-- MAIN -->
    <main class="main-content">

        <!-- HEADER -->
        <div class="page-header">

            <div>

                <h1>Halo, <?php echo $nama; ?> 👋</h1>

                <p>Pantau jadwal catering dan status pesanan kamu</p>

            </div>

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" placeholder="Cari pesanan...">

            </div>

        </div>

        <!-- TOP CARD -->
        <div class="top-cards">

            <div class="card pink">

                <h3>Total Pesanan</h3>

                <h1>12</h1>

                <p>Pesanan aktif bulan ini</p>

            </div>

            <div class="card">

                <h3>Sudah Dibayar</h3>

                <h1>8</h1>

                <p>Pembayaran selesai</p>

            </div>

            <div class="card">

                <h3>Menunggu</h3>

                <h1>4</h1>

                <p>Menunggu konfirmasi admin</p>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="content-grid">

            <!-- KALENDER -->
            <div class="calendar-card">

                <div class="calendar-header">

                    <button onclick="prevMonth()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <h2 id="monthYear"></h2>

                    <button onclick="nextMonth()">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>

                </div>

                <div class="calendar-days">

                    <div>Sen</div>
                    <div>Sel</div>
                    <div>Rab</div>
                    <div>Kam</div>
                    <div>Jum</div>
                    <div>Sab</div>
                    <div>Min</div>

                </div>

                <div class="calendar-dates" id="calendarDates"></div>

            </div>

            <!-- STATUS -->
            <div class="status-card">

                <div class="status-box">

                    <h3>Diproses</h3>

                    <div class="circle orange">
                        60%
                    </div>

                </div>

                <div class="status-box">

                    <h3>Dikirim</h3>

                    <div class="circle blue">
                        90%
                    </div>

                </div>

                <div class="status-box">

                    <h3>Selesai</h3>

                    <div class="circle pink-circle">
                        100%
                    </div>

                </div>

            </div>

        </div>

        <!-- POPUP -->
        <div class="nota-popup" id="notaPopup">

            <div class="popup-header">

                <h3>Nota Pembayaran</h3>

                <button onclick="closePopup()">
                    <i class="fa-solid fa-xmark"></i>
                </button>

            </div>

            <div class="nota-item">
                <span>Pesanan</span>
                <strong>Paket Catering Premium</strong>
            </div>

            <div class="nota-item">
                <span>Total</span>
                <strong>Rp 250.000</strong>
            </div>

            <div class="nota-item">
                <span>Status</span>
                <strong class="paid">Sudah Dibayar</strong>
            </div>

            <div class="nota-item">
                <span>Tanggal Ambil</span>
                <strong id="tanggalAmbil">-</strong>
            </div>

        </div>

        <!-- PESANAN -->
        <div class="orders-list">

            <div class="list-header">

                <h2>Pesanan Terbaru</h2>

                <a href="#">Lihat Semua</a>

            </div>

            <div class="order-items">

                <div class="order-card">

                    <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=1000">

                    <div class="order-info">

                        <h3>Paket Ulang Tahun</h3>

                        <p>20 Pax • Nasi Box Premium</p>

                    </div>

                    <div class="order-price">
                        Rp 550.000
                    </div>

                    <div class="order-status success">
                        Lunas
                    </div>

                </div>

                <div class="order-card">

                    <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1000">

                    <div class="order-info">

                        <h3>Paket Meeting Kantor</h3>

                        <p>15 Pax • Snack Box</p>

                    </div>

                    <div class="order-price">
                        Rp 320.000
                    </div>

                    <div class="order-status pending">
                        Pending
                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

<script>

const monthYear = document.getElementById("monthYear");
const calendarDates = document.getElementById("calendarDates");

let currentDate = new Date();

function renderCalendar(){

    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    const monthNames = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    monthYear.innerHTML = `${monthNames[month]} ${year}`;

    calendarDates.innerHTML = "";

    let startDay = firstDay === 0 ? 6 : firstDay - 1;

    for(let i = 0; i < startDay; i++){
        calendarDates.innerHTML += `<div></div>`;
    }

    for(let day = 1; day <= lastDate; day++){

        const today = new Date();

        let activeClass = "";

        if(
            day === today.getDate() &&
            month === today.getMonth() &&
            year === today.getFullYear()
        ){
            activeClass = "today";
        }

        let notif = "";

        if(day === 5 || day === 12 || day === 20){
           notif = "";
        }

        calendarDates.innerHTML += `
            <div class="date ${activeClass}" onclick="showNota(${day})">
                ${day}
                ${notif}
            </div>
        `;
    }

}

function nextMonth(){
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
}

function prevMonth(){
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
}

function showNota(day){

    const popup = document.getElementById("notaPopup");

    popup.style.display = "block";

    document.getElementById("tanggalAmbil").innerHTML =
        day + " " + monthYear.innerText;

}

function closePopup(){

    document.getElementById("notaPopup").style.display = "none";

}

renderCalendar();

</script>

</body>
</html>
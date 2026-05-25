<aside class="sidebar">

    <div>

        <div class="sidebar-title">
            CORE
        </div>

        <ul class="menu">

            <li class="<?= ($page == 'index.php') ? 'active' : ''; ?>">
                <a href="index.php">
                    <i class="fa fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>
            </li>

        </ul>

        <div class="sidebar-title mt-4">
            OPERASIONAL
        </div>

        <ul class="menu">

            <!-- PRODUK -->
            <li class="<?= ($page == 'produk.php') ? 'active' : ''; ?>">
                <a href="produk.php">
                    <i class="fa fa-box"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- TRANSAKSI -->
            <li class="<?= ($page == 'transaksi.php') ? 'active' : ''; ?>">
                <a href="transaksi.php">
                    <i class="fa fa-file-invoice"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <!-- LAPORAN -->
            <li class="<?= ($page == 'laporan.php') ? 'active' : ''; ?>">
                <a href="laporan.php">
                    <i class="fa fa-chart-column"></i>
                    <span>Laporan</span>
                </a>
            </li>

        </ul>

        <div class="sidebar-title mt-4">
            AKUN
        </div>

        <ul class="menu">

            <!-- WEBSITE -->
            <li>
                <a href="../index.php" target="_blank">
                    <i class="fa fa-globe"></i>
                    <span>Website</span>
                </a>
            </li>

            <!-- LOGOUT -->
            <li>
                <a href="../auth/logout.php">
                    <i class="fa fa-right-from-bracket"></i>
                    <span>Keluar</span>
                </a>
            </li>

        </ul>

    </div>

    <!-- USER LOGIN -->
    <div class="sidebar-user">

        <small>Login sebagai:</small>

        <h6>
            <?= $_SESSION['nama']; ?>
        </h6>

    </div>

</aside>
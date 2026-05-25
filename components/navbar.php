

<?php 
// Memastikan session berjalan agar bisa mengecek status login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">

  <div class="logo">
    FlavorVibe<span>.</span>a
  </div>

  <ul class="nav-links">

    <li><a href="index.php">Beranda</a></li>
    <li><a href="#catalog">Catalog</a></li>
    <li><a href="index.php#about">Tentang Kami</a></li>
    
    
    <?php if (isset($_SESSION['id_user'])) : ?>
        <li><a href="auth/logout.php" style="color: #c62828; font-weight: 700;">Logout</a></li>
    <?php else : ?>
        <li><a href="auth/login.php">Login</a></li>
    <?php endif; ?>

  </ul>

</nav>


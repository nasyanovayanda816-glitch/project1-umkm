<?php
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Arahkan kembali ke halaman utama (index.php)
header("Location: ../index.php");
exit();
?>
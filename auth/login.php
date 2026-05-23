<?php
session_start();
// Baris 4: Tambah ../ agar keluar dari folder auth terlebih dahulu
require_once '../config/koneksi.php';

// Baris 7-10: Jika user sudah login, arahkan keluar ke index.php utama
if (isset($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}

$error = '';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);
        
        if (password_verify($password, $row['password'])) {
            
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['role'] = $row['role'];

    if ($row['role'] == 'admin') {

        header("Location: ../admin/index.php");

    } else {

        header("Location: ../user/index.user.php");

    }

    exit();

} else {

    $error = "Password yang Anda masukkan salah!";

}
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FlavorVibe</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Gaya CSS sama persis dengan register agar seragam */
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fafafa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .auth-card { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); width: 100%; max-width: 400px; }
        .auth-card h2 { text-align: center; color: #111; margin-bottom: 10px; }
        .auth-card p { text-align: center; color: #666; margin-bottom: 25px; font-size: 14px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 5px; font-size: 14px; font-weight: 500; color: #333; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; font-family: inherit; box-sizing: border-box; }
        .form-group input:focus { border-color: #f26b7a; }
        .btn-submit { width: 100%; padding: 12px; background-color: #f26b7a; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; transition: 0.3s; }
        .btn-submit:hover { background-color: #d95360; }
        .auth-link { text-align: center; margin-top: 20px; font-size: 14px; }
        .auth-link a { color: #f26b7a; text-decoration: none; font-weight: 600; }
        .alert-error { background-color: #ffebee; color: #c62828; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; border: 1px solid #ffcdd2; text-align: center; }
    </style>
</head>
<body>

    <div class="auth-card">
        <h2>Selamat Datang!</h2>
        <p>Silakan masuk ke akun Anda.</p>

        <?php if ($error != ''): ?>
            <div class="alert-error"><?= $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="Masukkan email Anda">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Masukkan password Anda">
            </div>
            <button type="submit" name="login" class="btn-submit">Masuk</button>
        </form>

        <div class="auth-link">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </div>
    </div>

</body>
</html>
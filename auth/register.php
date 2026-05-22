<?php
session_start();
// Panggil file koneksi
require_once '../config/koneksi.php';

$error = '';

if (isset($_POST['register'])) {
    // Menangkap dan mengamankan inputan dari form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $konfirmasi = mysqli_real_escape_string($conn, $_POST['konfirmasi']);
    $role = 'pelanggan'; // Default role untuk register publik

    // Validasi apakah password & konfirmasi sama
    if ($password !== $konfirmasi) {
        $error = "Password dan Konfirmasi Password tidak cocok!";
    } else {
        // Cek apakah email sudah terdaftar sebelumnya
        $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($cek_email) > 0) {
            $error = "Email sudah terdaftar, silakan gunakan email lain atau login.";
        } else {
            // Enkripsi password menggunakan BCRYPT
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Masukkan data ke database
            $query = "INSERT INTO users (nama, email, password, no_hp, alamat, role) 
                      VALUES ('$nama', '$email', '$hashed_password', '$no_hp', '$alamat', '$role')";

            if (mysqli_query($conn, $query)) {
                echo "<script>
                        alert('Registrasi Berhasil! Silakan Login.');
                        window.location.href = 'login.php';
                      </script>";
                exit();
            } else {
                $error = "Terjadi kesalahan sistem: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - FlavorVibe</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fafafa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .auth-card { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); width: 100%; max-width: 450px; }
        .auth-card h2 { text-align: center; color: #111; margin-bottom: 10px; }
        .auth-card p { text-align: center; color: #666; margin-bottom: 25px; font-size: 14px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-size: 14px; font-weight: 500; color: #333; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; font-family: inherit; }
        .form-group input:focus, .form-group textarea:focus { border-color: #f26b7a; }
        .btn-submit { width: 100%; padding: 12px; background-color: #f26b7a; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        .btn-submit:hover { background-color: #d95360; }
        .auth-link { text-align: center; margin-top: 20px; font-size: 14px; }
        .auth-link a { color: #f26b7a; text-decoration: none; font-weight: 600; }
        .alert-error { background-color: #ffebee; color: #c62828; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; border: 1px solid #ffcdd2; }
    </style>
</head>
<body>

    <div class="auth-card">
        <h2>Buat Akun</h2>
        <p>Bergabunglah bersama kami untuk menikmati hidangan spesial.</p>

        <?php if ($error != ''): ?>
            <div class="alert-error"><?= $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required placeholder="Masukkan nama lengkap">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="email@contoh.com">
            </div>
            <div class="form-group">
                <label>Nomor HP</label>
                <input type="text" name="no_hp" required placeholder="08xxxxxxxxxx">
            </div>
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" rows="3" required placeholder="Masukkan alamat pengiriman"></textarea>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Buat password">
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="konfirmasi" required placeholder="Ulangi password">
            </div>
            <button type="submit" name="register" class="btn-submit">Daftar Sekarang</button>
        </form>

        <div class="auth-link">
            Sudah punya akun? <a href="login.php">Masuk di sini</a>
        </div>
    </div>

</body>
</html>
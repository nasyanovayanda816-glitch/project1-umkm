<?php
include 'config/koneksi.php';

if(isset($_POST['submit'])){
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Upload gambar
    $foto = null;
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = uniqid() . "." . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], "assets/img/".$foto);
    }

    mysqli_query($conn,"INSERT INTO produk(nama_produk,harga,stok,kategori,foto,created_at)
        VALUES('$nama','$harga','$stok','$kategori','$foto',NOW())");
    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tambah Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Tambah Produk</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Harga</label>
      <input type="number" name="harga" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Stok</label>
      <input type="number" name="stok" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <input type="text" name="kategori" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Foto</label>
      <input type="file" name="foto" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
    <a href="products.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
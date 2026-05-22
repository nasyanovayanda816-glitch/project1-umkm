<?php
include 'config/koneksi.php';
$id = $_GET['id'] ?? 0;
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id");
$produk = mysqli_fetch_assoc($result);

if(!$produk){ die("Produk tidak ditemukan"); }

if(isset($_POST['submit'])){
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Upload gambar baru jika ada
    if(isset($_FILES['foto']) && $_FILES['foto']['error']==0){
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = uniqid().".".$ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], "assets/img/".$foto);
        mysqli_query($conn,"UPDATE produk SET foto='$foto' WHERE id_produk=$id");
    }

    $update = "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok', kategori='$kategori' WHERE id_produk=$id";
    mysqli_query($conn,$update);
    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Produk</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" value="<?= $produk['nama_produk'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Harga</label>
      <input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Stok</label>
      <input type="number" name="stok" class="form-control" value="<?= $produk['stok'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <input type="text" name="kategori" class="form-control" value="<?= $produk['kategori'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Foto</label>
      <?php if($produk['foto']): ?>
        <img src="assets/img/<?= $produk['foto'] ?>" width="120"><br><br>
      <?php endif; ?>
      <input type="file" name="foto" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    <a href="products.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
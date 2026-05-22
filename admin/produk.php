<?php
include 'config/koneksi.php';
include 'includes/sidebar.php';
include 'includes/topbar.php';

$data = mysqli_query($conn,"SELECT * FROM produk");
?>

<div class="container mt-5">
  <h2 class="mb-4">Data Produk</h2>
  <a href="add-product.php" class="btn btn-success mb-3">Tambah Produk</a>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr><th>No</th><th>Nama Produk</th><th>Harga</th><th>Stok</th><th>Foto</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    <?php $no=1; while($row=mysqli_fetch_assoc($data)){ ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_produk'] ?></td>
        <td><?= number_format($row['harga'],2) ?></td>
        <td><?= $row['stok'] ?></td>
        <td><?php if($row['foto']): ?><img src="assets/img/<?= $row['foto'] ?>" width="80"><?php endif; ?></td>
        <td>
          <a href="edit-product.php?id=<?= $row['id_produk'] ?>" class="btn btn-primary btn-sm">Edit</a>
          <a href="delete-product.php?id=<?= $row['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
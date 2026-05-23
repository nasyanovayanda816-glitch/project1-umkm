<?php

include 'config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM produk WHERE id_produk='$id'"
);

$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "

        UPDATE produk

        SET

        nama_produk='$nama',
        harga='$harga',
        stok='$stok'

        WHERE id_produk='$id'

    ");

    header('Location: products.php');

}

?>

<form method="POST">

<input
type="text"
name="nama_produk"
value="<?= $row['nama_produk']; ?>">

<input
type="number"
name="harga"
value="<?= $row['harga']; ?>">

<input
type="number"
name="stok"
value="<?= $row['stok']; ?>">

<button type="submit" name="submit">
Update
</button>

</form>
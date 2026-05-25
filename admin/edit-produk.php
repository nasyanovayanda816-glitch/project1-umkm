<?php

session_start();

include 'config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "
    SELECT * FROM produk
    WHERE id_produk='$id'
");

$produk = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){

    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $fotoLama = $produk['foto'];
    $fotoBaru = $fotoLama;

    // upload foto baru
    if($_FILES['foto']['name']){

        $fotoBaru = time() . '_' . $_FILES['foto']['name'];

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            '../assets/img/' . $fotoBaru
        );
    }

    mysqli_query($conn, "

        UPDATE produk SET

        nama_produk = '$nama',
        harga = '$harga',
        stok = '$stok',
        foto = '$fotoBaru'

        WHERE id_produk='$id'

    ");

    header('Location: produk.php');

}

$page = "produk.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="wrapper">

<?php include 'includes/sidebar.php'; ?>

<main class="main">

<!-- TOPBAR -->
<div class="topbar">

    <div>
        <h2>Edit Produk</h2>
        <p>Update produk kamu ✨</p>
    </div>

</div>

<!-- CARD -->
<div class="modern-edit-card">

<form method="POST" enctype="multipart/form-data">

<div class="edit-grid">

    <!-- LEFT -->
    <div>

        <div class="input-group-modern">

            <label>Nama Produk</label>

            <input
            type="text"
            name="nama_produk"
            value="<?= $produk['nama_produk']; ?>"
            required>

        </div>

        <div class="input-group-modern">

            <label>Harga Produk</label>

            <input
            type="number"
            name="harga"
            value="<?= $produk['harga']; ?>"
            required>

        </div>

        <div class="input-group-modern">

            <label>Stok Produk</label>

            <input
            type="number"
            name="stok"
            value="<?= $produk['stok']; ?>"
            required>

        </div>

        <div class="input-group-modern">

            <label>Ganti Foto</label>

            <input
            type="file"
            name="foto"
            id="foto">

        </div>

        <button
        type="submit"
        name="update"
        class="btn-modern-save">

            <i class="fa fa-floppy-disk"></i>
            Simpan Perubahan

        </button>

    </div>

    <!-- RIGHT -->
    <div class="preview-area">

        <h5>Preview Produk</h5>

        <img
        src="assets/img/<?= $produk['foto']; ?>"
        id="preview"
        class="preview-modern">

    </div>

</div>

</form>

</div>

</main>

</div>

<script>

const foto = document.getElementById('foto');
const preview = document.getElementById('preview');

foto.addEventListener('change', function(){

    const file = this.files[0];

    if(file){

        preview.src = URL.createObjectURL(file);

    }

});

</script>

</body>
</html>
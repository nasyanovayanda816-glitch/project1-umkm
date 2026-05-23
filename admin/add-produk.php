<?php

session_start();

include 'config/koneksi.php';

$pageTitle = "Tambah Produk";

if(isset($_POST['submit'])){

    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $foto = '';

    if($_FILES['foto']['name']){

        $foto = time() . '_' . $_FILES['foto']['name'];

move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/' . $foto);

    }

    mysqli_query($conn, "

        INSERT INTO produk
        (
            nama_produk,
            harga,
            stok,
            foto
        )

        VALUES
        (
            '$nama',
            '$harga',
            '$stok',
            '$foto'
        )

    ");

    header('Location: produk.php');
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Produk</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- CSS -->
<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="wrapper">

    <?php include 'includes/sidebar.php'; ?>

    <main class="main">

        <?php include 'includes/topbar.php'; ?>

        <div class="add-produk-container">

            <h2>Tambah Produk</h2>

            <form method="POST" enctype="multipart/form-data">

                <input
                type="text"
                name="nama_produk"
                placeholder="Nama Produk"
                required>

                <input
                type="number"
                name="harga"
                placeholder="Harga"
                required>

                <input
                type="number"
                name="stok"
                placeholder="Stok"
                required>

                <input
                type="file"
                name="foto"
                id="foto">

                <img
                id="preview"
                class="preview-img"
                style="display:none;">

                <button type="submit" name="submit">
                    Simpan Produk
                </button>

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
        preview.style.display = 'block';

    }

});

</script>

</body>
</html>
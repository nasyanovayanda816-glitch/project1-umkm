<?php

include 'config/koneksi.php';

$query = "SELECT * FROM products";

$data = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Data Products</h2>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>

        </thead>

        <tbody>

        <?php

        $no = 1;

        while($row = mysqli_fetch_assoc($data)){

        ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= $row['nama_produk']; ?></td>

                <td>
                    Rp <?= number_format($row['harga']); ?>
                </td>

                <td><?= $row['stok']; ?></td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>
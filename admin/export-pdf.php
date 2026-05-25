<?php

include 'config/koneksi.php';

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

/* =========================================
   QUERY DATA
========================================= */

$query = mysqli_query($conn, "
    SELECT * FROM pesanan
    ORDER BY id_pesanan DESC
");

/* =========================================
   HTML PDF
========================================= */

$html = '

<style>

body{
    font-family: sans-serif;
}

.title{
    text-align:center;
    margin-bottom:25px;
}

.title h2{
    margin:0;
    color:#2563eb;
}

.title p{
    color:#6b7280;
    font-size:13px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#2563eb;
    color:white;
    padding:12px;
    font-size:13px;
}

td{
    border:1px solid #ddd;
    padding:10px;
    font-size:12px;
}

.status-lunas{
    color:green;
    font-weight:bold;
}

.status-belum{
    color:red;
    font-weight:bold;
}

.footer{
    margin-top:30px;
    font-size:12px;
    text-align:right;
    color:#888;
}

</style>

<div class="title">

    <h2>Laporan Penjualan</h2>

    <p>
        Export Data Transaksi UMKM
    </p>

</div>

<table>

<tr>

<th>No Invoice</th>
<th>Pelanggan</th>
<th>Status Bayar</th>
<th>Status Pesanan</th>
<th>Total</th>

</tr>

';

/* =========================================
   LOOP DATA
========================================= */

while($row = mysqli_fetch_assoc($query)){

    $statusBayar = '';

    if($row['status_pembayaran'] == 'Lunas'){

        $statusBayar =
        '<span class="status-lunas">Lunas</span>';

    }else{

        $statusBayar =
        '<span class="status-belum">Belum Bayar</span>';

    }

    $html .= '

    <tr>

    <td>
        #INV-'.$row['id_pesanan'].'
    </td>

    <td>
        '.$row['nama_pelanggan'].'
    </td>

    <td>
        '.$statusBayar.'
    </td>

    <td>
        '.$row['status'].'
    </td>

    <td>
        Rp '.number_format($row['total_harga']).'
    </td>

    </tr>

    ';
}

$html .= '

</table>

<div class="footer">

Dicetak pada :
'.date('d M Y H:i').'

</div>

';

/* =========================================
   DOMPDF
========================================= */

$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream(
    "laporan-penjualan.pdf",
    array("Attachment" => true)
);

?>
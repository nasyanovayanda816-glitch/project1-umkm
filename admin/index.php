<?php
include 'config/koneksi.php';
include 'includes/sidebar.php';
include 'includes/topbar.php';

// Total Produk
$totalProduk = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM produk"));
// Total Users
$totalUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
// Total Orders
$totalOrders = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pesanan"));
// Growth dummy
$growth = "+12%";

// Chart data (sales per month)
$salesData = [];
for($m=1;$m<=12;$m++){
  $res = mysqli_query($conn,"SELECT SUM(subtotal) as total FROM detail_pesanan WHERE MONTH(created_at)=$m");
  $row = mysqli_fetch_assoc($res);
  $salesData[] = $row['total'] ?? 0;
}
?>

<div class="row g-4">
  <div class="col-lg-3 col-md-6">
    <div class="stat-card blue"><div><h6>Total Produk</h6><h2><?= $totalProduk ?></h2></div><i class="fa fa-box icon"></i></div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="stat-card green"><div><h6>Total Users</h6><h2><?= $totalUsers ?></h2></div><i class="fa fa-users icon"></i></div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="stat-card orange"><div><h6>Total Orders</h6><h2><?= $totalOrders ?></h2></div><i class="fa fa-cart-shopping icon"></i></div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="stat-card red"><div><h6>Growth</h6><h2><?= $growth ?></h2></div><i class="fa fa-chart-line icon"></i></div>
  </div>
</div>

<div class="chart-card">
  <div class="chart-header"><h5>Sales Overview</h5><button class="btn btn-primary">Export</button></div>
  <canvas id="salesChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('salesChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    datasets: [{
      label:'Sales',
      data: <?= json_encode($salesData) ?>,
      borderColor:'#3b82f6',
      backgroundColor:'rgba(59,130,246,0.15)',
      fill:true,
      tension:0.5,
      borderWidth:4,
      pointRadius:5
    }]
  },
  options:{responsive:true, plugins:{legend:{display:false}}}
});
</script>
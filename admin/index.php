<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Modern Dashboard</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="wrapper">

  <!-- SIDEBAR -->
  <aside class="sidebar">

    <div class="logo">
      <i class="fa fa-layer-group"></i>
      MyAdmin
    </div>

    <ul class="menu">

      <li class="active">
        <a href="#">
          <i class="fa fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fa fa-chart-line"></i>
          <span>Analytics</span>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Users</span>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fa fa-wallet"></i>
          <span>Transactions</span>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fa fa-box"></i>
          <span>Products</span>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Settings</span>
        </a>
      </li>

    </ul>

  </aside>

  <!-- MAIN -->
  <main class="main">

    <!-- TOPBAR -->
    <div class="topbar">

      <div>
        <h2>Dashboard</h2>
        <p>Welcome back 👋</p>
      </div>

      <div class="topbar-right">

        <div class="search-area">
          <i class="fa fa-search"></i>
          <input type="text" placeholder="Search here...">
        </div>

        <div class="notification">
          <i class="fa fa-bell"></i>
        </div>

        <img src="https://i.pravatar.cc/150?img=12" class="profile">

      </div>

    </div>

    <!-- STATS -->
    <div class="row g-4">

      <div class="col-lg-3 col-md-6">
        <div class="stat-card blue">
          <div>
            <h6>Total Revenue</h6>
            <h2>$12,500</h2>
          </div>

          <i class="fa fa-dollar-sign icon"></i>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stat-card green">
          <div>
            <h6>Total Users</h6>
            <h2>1,250</h2>
          </div>

          <i class="fa fa-users icon"></i>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stat-card orange">
          <div>
            <h6>Total Orders</h6>
            <h2>320</h2>
          </div>

          <i class="fa fa-cart-shopping icon"></i>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stat-card red">
          <div>
            <h6>Growth</h6>
            <h2>+12%</h2>
          </div>

          <i class="fa fa-chart-line icon"></i>
        </div>
      </div>

    </div>

    <!-- CHART -->
    <div class="chart-card">

      <div class="chart-header">
        <h5>Sales Overview</h5>

        <button class="btn btn-primary">
          Export
        </button>
      </div>

      <canvas id="salesChart"></canvas>

    </div>

    <!-- TABLE -->
    <div class="table-card">

      <div class="table-header">
        <h5>Recent Transactions</h5>

        <button class="btn btn-light">
          View All
        </button>
      </div>

      <table class="table align-middle">

        <thead>
          <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Status</th>
            <th>Amount</th>
          </tr>
        </thead>

        <tbody>

          <tr>
            <td>John Doe</td>
            <td>iPhone 15 Pro</td>
            <td>
              <span class="badge bg-success">
                Completed
              </span>
            </td>
            <td>$1200</td>
          </tr>

          <tr>
            <td>Sarah</td>
            <td>Macbook Air</td>
            <td>
              <span class="badge bg-warning">
                Pending
              </span>
            </td>
            <td>$2200</td>
          </tr>

          <tr>
            <td>Michael</td>
            <td>Airpods Pro</td>
            <td>
              <span class="badge bg-danger">
                Cancelled
              </span>
            </td>
            <td>$250</td>
          </tr>

        </tbody>

      </table>

    </div>

  </main>

</div>

<!-- CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- JS -->
<script src="script.js"></script>

</body>
</html>
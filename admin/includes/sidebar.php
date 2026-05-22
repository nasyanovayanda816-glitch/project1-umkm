<aside class="sidebar">
  <div class="logo"><i class="fa fa-layer-group"></i> MyAdmin</div>
  <?php $page = basename($_SERVER['PHP_SELF']); ?>
  <ul class="menu">
    <li class="<?= ($page=='index.php')?'active':'' ?>">
      <a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li>
    <li class="<?= ($page=='products.php')?'active':'' ?>">
      <a href="products.php"><i class="fa fa-box"></i> <span>Products</span></a>
    </li>
  </ul>
</aside>
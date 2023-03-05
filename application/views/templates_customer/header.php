<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tokoku</title>
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css" rel="stylesheet">
</head>
<body>

  <!-- navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="<?= site_url(); ?>">Home</a></li>
        <li><a href="<?= site_url('keranjang') ?>">Keranjang</a></li>
        <!-- Jika sudah login (ada login pelanggan) -->
        <?php if($this->session->userdata('id_pelanggan')): ?>
          <li><a href="<?= site_url('customer/auth/logout') ?>">Logout</a></li>
          <li><a href="<?= site_url('riwayat') ?>">Riwayat Belanja</a></li>
        <!-- Selain itu (belum login / belum ada session pelanggan) -->
        <?php else: ?>
          <li><a href="<?= site_url('login') ?>">Login</a></li>
          <li><a href="<?= site_url('daftar') ?>">Daftar</a></li>
        <?php endif; ?>

        <li><a href="<?= site_url('checkout') ?>">Checkout</a></li>

      </ul>

      <form action="<?= site_url('customer/product/search') ?>" method="get" class="navbar-form navbar-right">
        <input type="text" class="form-control" name="keyword">
        <button class="btn btn-primary">Cari</button>
      </form>
    </div>
  </nav>
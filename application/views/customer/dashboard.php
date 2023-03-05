<section class="content">
  <div class="container">
    <h1>Produk Terbaru</h1>
    <div class="row">
      <?php
      foreach($products as $product):
      ?>
      <div class="col-md-3">
        <div class="thumbnail">
          <img src="<?= base_url('uploads/') ?>produk/<?= $product->foto_produk; ?>">
          <div class="caption">
            <h3><?= $product->nama_produk; ?></h3>
            <h5>Rp. <?= number_format($product->harga_produk); ?>,-</h5>
            <a href="<?= site_url('customer/buy/'.$product->id_produk) ?>" class="btn btn-primary">beli</a>
            <a href="<?= site_url('customer/detail/'.$product->id_produk) ?>" class="btn btn-default">detail</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>


    </div>
  </div>
</section>

</body>
</html>
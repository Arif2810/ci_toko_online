<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?= base_url('uploads/produk/'.$product['foto_produk']) ?>" class="img-responsive">
      </div>
      <div class="col-md-6">
        <h2><?= $product['nama_produk']; ?></h2>
        <h4>Rp. <?= number_format($product['harga_produk']); ?>,-</h4>
        <h5>Stok : <?= $product['stok_produk']; ?></h5>
        <form action="" method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="number" min="1" max="<?= $product['stok_produk']; ?>" class="form-control" name="jumlah" required>
              <div class="input-group-btn">
                <button class="btn btn-primary" name="beli">beli</button>
              </div>
            </div>
          </div>
        </form>

        <p><?= $product['deskripsi_produk']; ?></p>
      </div>
    </div>
  </div>
</section>
  
</body>
</html>
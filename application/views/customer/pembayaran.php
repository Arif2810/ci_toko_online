<section class="content">
  <div class="container">
    <h3>Konfirmasi Pembayaran</h3>
    <p>Kirim bukti pembayaran anda disini</p>
    <div class="row">
      <div class="col-md-8">
        <div class="alert alert-info">total tagihan anda <strong>Rp. <?= number_format($get_pembelian['total_pembelian']); ?>,-</strong></div>
        <form action="<?= site_url('customer/sale/pembayaran_action') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama Penyetor</label>
            <input type="text" class="form-control" name="nama" required>
            <input type="hidden" class="form-control" value="<?= $get_pembelian['id_pembelian'] ?>" name="id_pembelian">
          </div>
          <div class="form-group">
            <label for="">Bank</label>
            <input type="text" class="form-control" name="bank" required>
          </div>
          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" min="1" required>
          </div>
          <div class="form-group">
            <label for="">Foto Bukti</label>
            <input type="file" class="form-control" name="bukti" required>
            <p class="text-danger">foto bukti harus JPG maksimal 2 MB</p>
          </div>
          <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>

      </div>
    </div>
  </div>
</section>
  
</body>
</html>
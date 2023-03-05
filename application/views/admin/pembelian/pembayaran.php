<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Data Pembayaran</h2>

    <div class="row">
      <div class="col-md-6">
        <table class="table">
          <tr>
            <th>Nama</th>
            <td><?= $pembayaran['nama']; ?></td>
          </tr>
          <tr>
            <th>Bank</th>
            <td><?= $pembayaran['bank']; ?></td>
          </tr>
          <tr>
            <th>Jumlah</th>
            <td>Rp. <?= number_format($pembayaran['jumlah']); ?>,-</td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td><?= date("d/m/Y", strtotime($pembayaran["tanggal"])); ?></td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <img src="<?= base_url('uploads/bukti/'.$pembayaran['bukti']) ?>" alt="" class="img-responsive">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <form action="<?= site_url('admin/purchase/pembayaran_action') ?>" method="post">
          <div class="form-group">
            <Label>No Resi Pengiriman</Label>
            <input type="hidden" class="form-control" name="id_pembelian" value="<?= $pembayaran['id_pembelian'] ?>">
            <input type="text" class="form-control" name="resi" required>
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control" required>
              <option value="">Pilih Status</option>
              <option value="lunas">Lunas</option>
              <option value="barang dikirim">Barang Dikirim</option>
              <option value="batal">Batal</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Proses</button>
          <a href="<?= site_url('admin/pembelian') ?>" class="btn btn-warning">Kembali</a>
        </form>
      </div>
    </div>

  </div>
</div>
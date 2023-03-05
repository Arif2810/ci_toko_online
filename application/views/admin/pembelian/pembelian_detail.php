<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Detail Pembelian</h2>

    <div class="row" style="margin-bottom:10px;">
      <div class="col-md-4">
        <h3>Pembelian</h3>
        tanggal : <?= date("d/m/Y", strtotime($detail["tanggal_pembelian"])); ?><br>
        total : Rp.<?= number_format($detail["total_pembelian"]); ?>,- <br>
        Status : <?= $detail['status_pembelian']; ?>
      </div>
      <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?= $detail["nama_pelanggan"]; ?></strong><br>
        <?= $detail["telepon_pelanggan"]; ?><br>
        <?= $detail["email_pelanggan"]; ?>
      </div>
      <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?= $detail['tipe']; ?> <?= $detail['distrik']; ?> <?= $detail['provinsi']; ?></strong><br>
        Ongkos kirim: Rp. <?= number_format($detail['ongkir']); ?>,-<br>
        Ekspedisi: <?= $detail['ekspedisi']; ?> <?= $detail['paket']; ?> <?= $detail['estimasi']; ?><br>
        Alamat: <?= $detail['alamat_pengiriman']; ?>
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr> 
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $this->db->select('*');
        $this->db->from('pembelian_produk');
        $this->db->where('id_pembelian', $detail['id_pembelian']);
        $produk = $this->db->get()->result();
        foreach($produk as $row):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row->nama; ?></td>
          <td>Rp. <?= number_format($row->harga); ?>,-</td>
          <td><?= $row->jumlah; ?></td>
          <td>Rp. <?= number_format($row->subharga); ?>,-</td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
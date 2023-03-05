<section class="content">
  <div class="container">
    <h2>Nota Pembelian</h2>

    <!-- <h3>Data orang yang beli $session</h3> -->
    <!-- <pre><?php //print_r($detail); ?></pre> -->

    <!-- <h3>Data orang yang login di session</h3> -->
    <!-- <pre><?php //print_r($_SESSION); ?></pre> -->

    <div class="row" style="margin-bottom: 10px;">
      <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong>No. Pembelian: <?= $nota['id_pembelian']; ?></strong><br>
        Tanggal: <?= date("d M Y", strtotime($nota['tanggal_pembelian'])); ?><br>
        Total: Rp. <?= number_format($nota['total_pembelian']) ?>,-
      </div>
      <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?= $nota['nama_pelanggan']; ?></strong><br>
        <p>
          <?= $nota['telepon_pelanggan']; ?><br>
          <?= $nota['email_pelanggan']; ?>
        </p>
      </div>
      <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?= $nota['tipe']." ".$nota['distrik']." ".$nota['provinsi']; ?></strong><br>
        Ongkos kirim: Rp. <?= number_format($nota['ongkir']); ?>,-<br>
        Ekspedisi: <?= $nota['ekspedisi']." ".$nota['paket']." ".$nota['estimasi']; ?>hari<br>
        Alamat: <?= $nota['alamat_pengiriman']; ?>
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Berat</th>
          <th>Jumlah</th>
          <th>Subberat</th>
          <th>Subtotal</th>
        </tr> 
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $this->db->select('*');
        $this->db->where('id_pembelian', $nota['id_pembelian']);
        $query = $this->db->get('pembelian_produk')->result();
        foreach($query as $row):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row->nama; ?></td>
          <td><?= number_format($row->harga); ?>,-</td>
          <td><?= $row->berat; ?></td>
          <td><?= $row->jumlah; ?></td>
          <td><?= $row->subberat; ?></td>
          <td><?= number_format($row->subharga); ?>,-</td>
        </tr>

        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="row">
      <div class="col-md-7">
        <div class="alert alert-info">
          <p>
            Silahkan lakukan pembayaran Rp. <?= number_format($nota['total_pembelian']); ?>,- ke <br>
            <strong>BANK MANDIRI 111-111-111 AN Asal Koding</strong>
          </p>
        </div>
      </div>
    </div>

  </div>
</section>
  
</body>
</html>
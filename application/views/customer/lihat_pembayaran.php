<?php 
// echo "<pre>";
// var_dump($pembayaran);
// die;
?>
<section class="content">
  <div class="container">
    <h3>Lihat Pembayaran</h3>
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
            <th>Tanggal</th>
            <td><?= date("d M Y", strtotime($pembayaran['tanggal'])); ?></td>
          </tr>
          <tr>
            <th>Jumlah</th>
            <td>Rp. <?= number_format($pembayaran['jumlah']); ?>,-</td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <img src="<?= base_url('uploads/bukti/'.$pembayaran['bukti']) ?>" alt="" class="img-responsive">
      </div>
    </div>
  </div>
</section>
  
</body>
</html>
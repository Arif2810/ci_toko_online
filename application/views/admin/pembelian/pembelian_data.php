<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Data Pembelian</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal Pembelian</th>
        <th>Status Pembelian</th>
        <th>Total</th>
        <th>aksi</th>
        </tr> 
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach($pembelian as $row):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row->nama_pelanggan; ?></td>
          <td><?= date("d F Y", strtotime($row->tanggal_pembelian)); ?></td>
          <td><?= $row->status_pembelian; ?></td>
          <td>Rp. <?= number_format($row->total_pembelian); ?>,-</td>
          <td>
            <a href="<?= site_url('admin/pembelian/detail/'.$row->id_pembelian) ?>" class="btn btn-primary btn-xs">Detail</a>
            <?php if($row->status_pembelian != 'pending'): ?>
              <a href="<?= site_url('admin/pembayaran/'.$row->id_pembelian) ?>" class="btn btn-success btn-xs">Pembayaran</a>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>


  </div>
</div>
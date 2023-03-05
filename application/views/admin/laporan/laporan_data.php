<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">

    <h2>Laporan Pembelian dari <?= $tgl_mulai; ?> hingga <?= $tgl_selesai; ?></h2>
    <hr>
    
    <form action="<?= site_url('admin/report/process') ?>" method="post">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="">Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglm" value="<?= $tgl_mulai; ?>">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgls" value="<?= $tgl_selesai; ?>">
          </div>
        </div>
        <div class="col-md-2">
          <label for="">&nbsp;</label><br>
          <button class="btn btn-primary" name="kirim">Lihat</button>
          <a href="<?= site_url('admin/report') ?>" class="btn btn-warning">Refresh</a>
        </div>
      </div>
    </form>
    
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Pelanggan</th>
          <th>Tanggal</th>
          <th>Jumlah</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $total = 0;
        // echo "<pre>";
        // print_r($reports);
        // die;
        foreach($reports as $report): ?>
        <?php $total += $report->total_pembelian; ?>
        <tr>
          <td><?= $no++; ?>.</td>
          <td><?= $report->nama_pelanggan; ?></td>
          <td><?= $report->tanggal_pembelian; ?></td>
          <td>Rp. <?= number_format($report->total_pembelian); ?>,-</td>
          <td><?= $report->status_pembelian; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="3">Total</th>
          <th>Rp. <?= number_format($total); ?>,-</th>
        </tr>
      </tfoot>
    </table>

  </div>
</div>


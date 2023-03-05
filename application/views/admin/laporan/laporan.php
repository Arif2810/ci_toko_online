<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">

    <h2>Laporan Pembelian dari <?= $tgl_awal == '' ? '-' : date("dMY", strtotime(($tgl_awal))); ?> hingga <?= $tgl_akhir == '' ? '-' : date("dMY", strtotime(($tgl_akhir))); ?> </h2>
    <hr>
    
    <form action="<?= site_url('admin/report') ?>" method="post">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="">Tanggal Mulai</label>
            <input type="date" class="form-control" name="tgl_awal" value="">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgl_akhir" value="">
          </div>
        </div>
        <div class="col-md-2">
          <label for="">&nbsp;</label><br>
          <button class="btn btn-primary" name="kirim">Lihat</button>
          <a href="" class="btn btn-warning btn-refresh">Refresh</a>
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
        $total = 0; 
        $no = 1;
        foreach($reports as $report): 
          $total += $report->total_pembelian; ?>
        <tr>
          <td><?= $no++; ?>.</td>
          <td><?= $report->nama_pelanggan; ?></td>
          <td><?= date("d/m/Y", strtotime(($report->tanggal_pembelian))); ?></td>
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


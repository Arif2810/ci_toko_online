<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Data Pelanggan</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>aksi</th>
        </tr> 
      </thead>
      <tbody>

        <?php 
        $no = 1;
        foreach($customers as $customer):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $customer->nama_pelanggan; ?></td>
          <td><?= $customer->email_pelanggan; ?></td>
          <td><?= $customer->telepon_pelanggan; ?></td>
          <td>
            <a href="<?= site_url('admin/pelanggan/hapus/'.$customer->id_pelanggan) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>

      </tbody>
    </table>


  </div>
</div>
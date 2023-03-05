<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h3>Data Kategori</h3>
    <hr>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach($categories as $category):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $category->nama_kategori; ?></td>
          <td>
            <a href="<?= site_url('admin/kategori/ubah/'.$category->id_kategori) ?>" class="btn btn-warning btn-xs">Ubah</a>
            <a href="<?= site_url('admin/kategori/hapus/'.$category->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus?')">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a href="<?= site_url('admin/kategori/tambah') ?>" class="btn btn-primary">Tambah Data</a>
  </div>
</div>
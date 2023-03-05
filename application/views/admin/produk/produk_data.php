<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Data Produk</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Berat</th>
        <th>Foto</th>
        <th>Stok</th>
        <th>aksi</th>
        </tr> 
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach($products as $product):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $product->nama_produk; ?></td>
          <td><?= $product->nama_kategori; ?></td>
          <td><?= $product->harga_produk; ?></td>
          <td><?= $product->berat_produk; ?></td>
          <td>
            <img src="<?= base_url('uploads/produk/'.$product->foto_produk); ?>" alt="" width="100">
          </td>
          <td><?= $product->stok_produk; ?></td>
          <td>
            <a href="<?= site_url('admin/barang/detail/'.$product->id_produk); ?>" class="btn btn-info btn-xs">detail</a> | 
            <a href="<?= site_url('admin/barang/ubah/'.$product->id_produk); ?>" class="btn btn-warning btn-xs">ubah</a> | 
            <a href="<?= site_url('admin/barang/delete/'.$product->id_produk); ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>

      </tbody>
    </table>

    <a href="<?= site_url('admin/barang/tambah') ?>" class="btn btn-primary">Tambah Data Produk</a>
  </div>
</div>
<!-- akhir konten -->
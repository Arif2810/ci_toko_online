<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Detail Produk</h2>
    <table class="table">
      <tr>
        <th>Produk</th>
        <td><?= $product['nama_produk']; ?></td>
      </tr>
      <tr>
        <th>Kategori</th>
        <td><?= $product['nama_kategori']; ?></td>
      </tr>
      <tr>
        <th>Harga</th>
        <td>Rp. <?= number_format($product['harga_produk']) ?>,-</td>
      </tr>
      <tr>
        <th>Berat</th>
        <td><?= $product['berat_produk']; ?></td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <td><?= $product['deskripsi_produk']; ?></td>
      </tr>
      <tr>
        <th>Stok</th>
        <td><?= $product['stok_produk']; ?></td>
      </tr>
    </table>

    <div class="row">
      <?php 
      $this->db->select('*');
      $this->db->where('id_produk', $product['id_produk']);
      $query = $this->db->get('produk_foto');
      foreach($query->result() as $row):
      ?>

      <div class="col-md-4 text-center">
        <img src="<?= base_url('uploads/produk/'.$row->nama_produk_foto) ?>" alt="" class="img-responsive"><br>
        <?php 
        if($product['foto_produk'] == $row->nama_produk_foto){ ?>
          <a href="<?= site_url('admin/product/hapus_foto/'.$row->id_produk_foto.' '.$row->id_produk) ?>" class="btn btn-danger btn-sm" disabled>hapus</a>
          <?php }
        else { ?>
          <a href="<?= site_url('admin/product/hapus_foto/'.$row->id_produk_foto.' '.$row->id_produk) ?>" class="btn btn-danger btn-sm">hapus</a>
        <?php } ?>
      </div>
      <?php endforeach; ?>
    </div><br>

    <div class="row">
      <div class="col-md-4">
        <form action="<?= site_url('admin/product/tambah_foto') ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_produk" value="<?= $product['id_produk'] ?>">
          <div class="form-group">
            <label for="">File Foto</label>
            <input type="file" name="produk_foto" class="form-control" required>
          </div>
          <button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
          <a href="<?= site_url('admin/barang') ?>" class="btn btn-warning">Kembali</a>
        </form>
      </div>
    </div>

  </div>
</div>
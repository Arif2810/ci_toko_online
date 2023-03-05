<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Ubah Produk</h2>

    <div class="row">
      <div class="col-md-8">
        <form action="<?= site_url('admin/product/edit_action') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama Produk</label>
            <input type="text" name="nama" class="form-control" value="<?= $product['nama_produk']; ?>">
            <input type="hidden" name="id" class="form-control" value="<?= $product['id_produk']; ?>">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" id="" class="form-control" required>
              <option value="">-Pilih kategori-</option>
              <?php foreach($categories as $category): ?>
              <option value="<?= $category->id_kategori ?>" <?php if($product['id_kategori'] == $category->id_kategori){echo "selected";} ?>>
                <?= $category->nama_kategori; ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Harga Rp.</label>
            <input type="number" name="harga" class="form-control" value="<?= $product['harga_produk']; ?>">
          </div>
          <div class="form-group">
            <label for="">Berat (gr)</label>
            <input type="number" name="berat" class="form-control" value="<?= $product['berat_produk']; ?>">
          </div>
          <div class="form-group">
            <label for="">Foto Produk</label><br>
            <img src="<?= base_url('uploads/produk/'.$product['foto_produk']) ?>" width="200">
            <input type="hidden" name="foto" class="form-control" value="<?= $product['foto_produk']; ?>">
          </div>
          <div class="form-group">
            <label for="">Ganti Foto</label>
            <input type="file" name="foto_produk" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="10">
              <?= $product['deskripsi_produk']; ?>
            </textarea>
          </div>
          <div class="form-group">
            <label for="">Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $product['stok_produk']; ?>">
          </div>
          <button name="ubah" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>

  </div>
</div>
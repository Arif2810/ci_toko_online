<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h2>Tambah Produk</h2>

    <div class="row">
      <div class="col-md-8">
        <form action="<?= site_url('admin/product/add_action') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama_produk" class="form-control">
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="id_kategori" id="" class="form-control">
                <option value="">-Pilih kategori-</option>
                <?php foreach($categories as $category): ?>
                  <option value="<?= $category->id_kategori; ?>"><?= $category->nama_kategori; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Harga (Rp)</label>
              <input type="number" name="harga_produk" class="form-control">
            </div>
            <div class="form-group">
              <label>Berat (gr)</label>
              <input type="number" name="berat_produk" class="form-control">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea type="text" name="deskripsi_produk" class="form-control" rows="6"></textarea>
            </div>
            <div class="form-group">
              <label>Foto</label>
              <div class="letak-input" style="margin-bottom: 5px;">
                <input type="file" name="foto_produk[]" class="form-control">
              </div>
              <span class="btn btn-primary btn-tambah">
                <i class="fa fa-plus"></i>
              </span>
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="number" name="stok_produk" class="form-control">
            </div>
          <button name="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click", function(){
			$(".letak-input").append("<input type='file' name='foto_produk[]' class='form-control'>");
		})
	})
</script>
<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h3>Tambah Kategori</h3>
    <hr>

    <div class="row">
      <div class="col-md-8">
        <form action="<?= site_url('admin/category/add_action') ?>" method="post">
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" name="nama_kategori" class="form-control">
            </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

  </div>
</div> 

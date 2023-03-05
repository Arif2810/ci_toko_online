<!-- konten -->
<div id="page-wrapper" >
  <div id="page-inner">
    <h3>Ubah Kategori</h3>
    <hr>

    <div class="row">
      <div class="col-md-8">
        <form action="<?= site_url('admin/category/edit_action') ?>" method="post">
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="hidden" name="id_kategori" class="form-control" value="<?= $category['id_kategori'] ?>">
              <input type="text" name="nama_kategori" class="form-control" value="<?= $category['nama_kategori'] ?>">
            </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>

  </div>
</div> 

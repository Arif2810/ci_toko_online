<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Daftar Pelanggan</h3>
          </div>
          <div class="panel-body">
            <form action="<?= site_url('customer/auth/register_action') ?>" method="post" class="form-horizontal">
              <div class="form-group">
                <label for="nama" class="control-label col-md-3">Nama</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="control-label col-md-3">Email</label>
                <div class="col-md-7">
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="control-label col-md-3">Password</label>
                <div class="col-md-7">
                  <input type="password" class="form-control" name="password" required>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat" class="control-label col-md-3">Alamat</label>
                <div class="col-md-7">
                  <textarea name="alamat" id="" cols="30" rows="4" class="form-control" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="telepon" class="control-label col-md-3">Telepon / HP</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="telepon" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button class="btn btn-primary" name="daftar">Daftar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
</body>
</html>
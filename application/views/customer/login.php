<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Login Pelanggan</h3>
        </div>
        <div class="panel-body">
          <form action="<?= site_url('customer/auth/login_action') ?>" method="post">
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>
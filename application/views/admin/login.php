<body>
	<div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /><br />
				<h2> Toko Online : Login</h2>
				
				<h5>( Login yourself to get access )</h5>
				<br />
			</div>
		</div>
		<div class="row ">
						
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong	strong>   Enter Details To Login </strong>
					</div>
					<div class="panel-body">
						<form role="form" method="post" action="<?= site_url('admin/auth/login_action') ?>">
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
								<input type="text" class="form-control" name="user" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
								<input type="password" class="form-control"  name="pass" />
							</div>
							<div class="form-group">
								<label class="checkbox-inline">
									<input type="checkbox" /> Remember me
								</label>
							</div>
										
							<button class="btn btn-primary" name="login">Login</button>
						</form>

					</div>
												
				</div>
			</div>			
						
		</div>
	</div>
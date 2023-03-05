<body>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">Binary admin</a> 
		</div>
		<div style="color: white;
		padding: 15px 50px 5px 50px;
		float: right;
		font-size: 16px;"> &nbsp; <a href="<?= site_url('admin/logout') ?>" class="btn btn-danger square-btn-adjust">Logout</a> 
		</div>
	</nav>

    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center">
						<img src="<?= base_url('assets/') ?>img/find_user.png" class="user-image img-responsive"/>
					</li>
					<li>
						<a href="<?= site_url('admin') ?>"><i class="fa fa-dashboard"></i>Home</a>
					</li>
					<li>
						<a href="<?= site_url('admin/barang'); ?>"><i class="fa fa-cube"></i> Produk</a>
					</li>
					<li>
						<a href="<?= site_url('admin/kategori'); ?>"><i class="fa fa-tags"></i> Kategori</a>
					</li>
					<li>
						<a href="<?= site_url('admin/pembelian'); ?>"><i class="fa fa-shopping-cart"></i>Pembelian</a>
					</li>
					<li>
						<a href="<?= site_url('admin/laporan'); ?>"><i class="fa fa-file"></i>Laporan</a>
					</li>
					<li>
						<a href="<?= site_url('admin/pelanggan'); ?>"><i class="fa fa-user"></i>Pelanggan</a>
					</li>
					<li>
						<a href="<?= site_url('admin/logout') ?>"><i class="fa fa-sign-out"></i>Logout</a>
					</li>      
				</ul>
			</div>   
    </nav>  
    <!-- /. NAV SIDE  -->
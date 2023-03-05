<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Raja Ongkir Codeigniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Cek Ongkir</h3>

			<?php echo form_open('shipping/cekongkir') ?>
			<div class="form-group">
			    <label for="exampleFormControlSelect1">Asal</label>
			    <select name="origin_province" id="origin_province" class="form-control" id="exampleFormControlSelect1">
			      <option>- provinsi -</option>
            <?php foreach($province->rajaongkir->results as $prov): ?>
              <option value="<?= $prov->province_id ?>"><?= $prov->province; ?></option>
            <?php endforeach; ?>
			    </select>
			    <br>
			     <select name="origin_city" id="origin_city" class="form-control" id="exampleFormControlSelect1">
			      <option>- Kota -</option>
			    </select>
		 	</div>

		 	<div class="form-group">
			    <label for="exampleFormControlSelect1">Tujuan</label>
			    <select name="destination_province" id="destination_province" class="form-control" id="exampleFormControlSelect1">
			      <option>- provinsi -</option>
            <?php foreach($province->rajaongkir->results as $prov): ?>
              <option value="<?= $prov->province_id ?>"><?= $prov->province; ?></option>
            <?php endforeach; ?>
			    </select>
			    <br>
			     <select name="destination_city" id="destination_city" class="form-control" id="exampleFormControlSelect1">
			      <option>- Kota -</option>
			    </select>
		 	</div>
		 	<button type="submit" class="btn btn-primary">Cek Ongkir</button>
		 	<?php echo form_close() ?>
		</div>
	</div>
</div>
</body>
</html>
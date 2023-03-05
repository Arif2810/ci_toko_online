<section class="content">
  <div class="container">
    <h1>Halaman Checkout</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        $totalberat = 0;
        $totalbelanja = 0;
        foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
          $this->db->select('*');
          $this->db->where('id_produk', $id_produk);
          $query = $this->db->get('produk');
          $produk = $query->row_array();
          $subharga = $produk['harga_produk'] * $jumlah;
          $subberat = $produk['berat_produk'] * $jumlah;
          $totalberat += $subberat;
        ?>
        <tr>
					<td><?= $no++; ?></td>
          <td><?= $produk['nama_produk']; ?></td>
          <td>Rp. <?= number_format($produk['harga_produk']); ?>,-</td>
          <td><?= $jumlah; ?></td>
          <td>Rp. <?= number_format($subharga); ?>,-</td>
				</tr>
        <?php $totalbelanja += $subharga; ?>
        <?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?= number_format($totalbelanja); ?>,-</th>
				</tr>
			</tfoot>
    </table>
    
    <form action="<?= site_url('customer/sale/checkout_proses') ?>" method="post">
      <input type="hidden" name="totalbelanja" value="<?= $totalbelanja ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?= $this->session->userdata('nama_pelanggan') ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?= $this->session->userdata('telepon_pelanggan') ?>" class="form-control">
					</div>
				</div>
      </div>
      <div class="form-group">
        <label for="">Alamat Lengkap Pengiriman</label>
        <textarea name="alamat_pengiriman" cols="30" rows="3" class="form-control" placeholder="Masukkan alamat lengkap pengiriman (termasuk kode pos)"></textarea>
      </div>

      <!-- source code dari rajaongkir -->
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Provinsi</label>
            <select name="nama_provinsi" id="nama_provinsi" class="form-control">

            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Distrik</label>
            <select name="nama_distrik" id="nama_distrik" class="form-control">
              <!-- Menggunakan javascript -->
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Ekspedisi</label>
            <select name="nama_ekspedisi" id="" class="form-control">
              
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Paket</label>
            <select name="nama_paket" id="" class="form-control">
              
            </select>
          </div>
        </div>
      </div>

      <input type="text" name="total_berat" value="<?= $totalberat ?>">
      <input type="text" name="provinsi">
      <input type="text" name="distrik">
      <input type="text" name="tipe">
      <input type="text" name="kodepos">
      <input type="text" name="ekspedisi">
      <input type="text" name="paket">
      <input type="text" name="ongkir">
      <input type="text" name="estimasi">
  
      <div class="form-group" style="margin-top: 10px;">
        <button class="btn btn-primary" name="checkout">Checkout</button>
      </div>
    </form>

  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
  $(document).ready(function(){
    $.ajax({
      type: 'post',
      url: '<?= site_url('customer/shipping/dataprovinsi') ?>',
      success: function(hasil_provinsi){
        $("select[name=nama_provinsi]").html(hasil_provinsi);
      }
    });

    $("select[name=nama_provinsi]").on("change", function(){
      // Ambil id_provinsi ynag dipilih (dari atribut pribadi)
      var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
      $.ajax({
        type: 'post',
        url: '<?= site_url('customer/shipping/datadistrik') ?>',
        data: 'id_provinsi='+id_provinsi_terpilih,
        success:function(hasil_distrik){
          $("select[name=nama_distrik]").html(hasil_distrik);
        }
      })
    });

    $.ajax({
      type: 'post',
      url: '<?= site_url('customer/shipping/jasaekspedisi') ?>',
      success: function(hasil_ekspedisi){
        $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
      }
    });

    $("select[name=nama_ekspedisi]").on("change", function(){
      // Mendapatkan data ongkos kirim

      // Mendapatkan ekspedisi yang dipilih
      var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
      // Mendapatkan id_distrik yang dipilih
      var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
      // Mendapatkan toatal berat dari inputan
      $total_berat = $("input[name=total_berat]").val();
      $.ajax({
        type: 'post',
        url: '<?= site_url('customer/shipping/datapaket') ?>',
        data: 'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+$total_berat,
        success: function(hasil_paket){
          // console.log(hasil_paket);
          $("select[name=nama_paket]").html(hasil_paket);

          // Meletakkan nama ekspedisi terpilih di input ekspedisi
          $("input[name=ekspedisi]").val(ekspedisi_terpilih);
        }
      })
    });

    $("select[name=nama_distrik]").on("change", function(){
      var prov = $("option:selected", this).attr('nama_provinsi');
      var dist = $("option:selected", this).attr('nama_distrik');
      var tipe = $("option:selected", this).attr('tipe_distrik');
      var kodepos = $("option:selected", this).attr('kodepos');
      
      $("input[name=provinsi]").val(prov);
      $("input[name=distrik]").val(dist);
      $("input[name=tipe]").val(tipe);
      $("input[name=kodepos]").val(kodepos);
    });

    $("select[name=nama_paket]").on("change", function(){
      var paket = $("option:selected", this).attr("paket");
      var ongkir = $("option:selected", this).attr("ongkir");
      var etd = $("option:selected", this).attr("etd");

      $("input[name=paket]").val(paket);
      $("input[name=ongkir]").val(ongkir);
      $("input[name=estimasi]").val(etd);
    })
  });
</script>
  
</body>
</html>
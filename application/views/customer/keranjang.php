<section class="content">
  <div class="container">
  <h1>keranjang Belanja</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        
        foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
          $this->db->select('*');
          $this->db->where('id_produk', $id_produk);
          $query = $this->db->get('produk');
          $row = $query->row_array();
          $subharga = $row['harga_produk'] * $jumlah;
        ?>

        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['nama_produk']; ?></td>
          <td><?= number_format($row['harga_produk']); ?>,-</td>
          <td><?= $jumlah; ?></td>
          <td><?= number_format($subharga); ?>,-</td>
          <td>
            <a href="<?= site_url('keranjang/hapus/'.$id_produk)?>" class="btn btn-danger btn-xs">Hapus</a>
          </td>
        </tr>


        <?php endforeach; ?>

      </tbody>
    </table>

    <a href="<?= site_url() ?>" class="btn btn-default">Lanjutkan Belanja</a>
    <a href="<?= site_url('checkout') ?>" class="btn btn-primary">Checkout</a>

  </div>
</section>
  
</body>
</html>
<section class="content">
  <div class="container">
    <h3>Riwayat Belanja <?= $this->session->userdata('nama_pelanggan'); ?></h3>

    <table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($riwayat == null):
				?>
				<tr>
					<td colspan="5">Tidak ada data riwayat... </td>
				</tr>
				<?php endif; ?>
        <?php 
        $no = 1;
        foreach($riwayat as $row):
        ?>
				<tr>
					<th><?= $no++; ?></th>
					<td><?= date("d F Y", strtotime($row->tanggal_pembelian)); ?></td>
					<td>
						<?= $row->status_pembelian; ?> <br>
						<?php if(!empty($row->resi_pengiriman)): ?>
							Resi : <?= $row->resi_pengiriman; ?>
						<?php endif; ?>
					</td>
					<td>Rp. <?= number_format($row->total_pembelian); ?>,-</td>
					<td>
						<a href="<?= site_url('nota/'.$row->id_pembelian); ?>" class="btn btn-info">Nota</a>
						<?php if($row->status_pembelian == 'pending'): ?>
							<a href="<?= site_url('pembayaran/'.$row->id_pembelian); ?>" class="btn btn-success">Input Pembayaran</a>
						<?php else: ?>
							<a href="<?= site_url('lihat_pembayaran/'.$row->id_pembelian); ?>" class="btn btn-warning">Lihat Pembayaran</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>

			</tbody>
    </table>

  </div>
</section>

</body>
</html>
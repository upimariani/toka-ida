<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="row">
				<div class="col-lg-12">
					<h6><span class="icon_tag_alt"></span> <?= $this->session->userdata('success') ?>
					</h6>
				</div>
			</div>
		<?php
		}
		?>

		<div class="checkout__form">
			<h4>Detail Pesanan</h4>
			<div class="row">
				<div class="col-lg-6">
					<p>Pesanan <strong><?= $detail['transaksi']->id_transaksi ?></strong></p>
					<p>Tanggal Order. <strong><?= $detail['transaksi']->tgl_transaksi ?></strong></p>
					<?php
					if ($detail['transaksi']->stat_order == '0') {
						echo '<p>Status Order: <span class="badge badge-danger">Belum Bayar</span></p>';
					} else if ($detail['transaksi']->stat_order == '1') {
						echo '<p>Status Order: <span class="badge badge-warning">Menunggu Konfirmasi</span></p>';
					} else if ($detail['transaksi']->stat_order == '2') {
						echo '<p>Status Order: <span class="badge badge-info">Pesanan Diproses</span></p>';
					} else if ($detail['transaksi']->stat_order == '3') {
						echo '<p>Status Order: <span class="badge badge-primary">Pesanan Dikirim</span></p>';
					} else if ($detail['transaksi']->stat_order == '4') {
						echo '<p>Status Order: <span class="badge badge-success">Pesanan Diterima</span></p>';
					}

					if ($detail['transaksi']->stat_order == '3') {
					?>
						<p>Silahkan konfirmasi pesanan jika pesanan telah diterima!</p>
						<a href="<?= base_url('pelanggan/cstatusorder/diterima/' . $detail['transaksi']->id_transaksi) ?>" class="site-btn mt-3 mb-3">Pesanan Diterima</a>
					<?php
					}
					?>


				</div>

				<div class="col-lg-6">
					<?php
					if ($detail['transaksi']->stat_order == '0') {
					?>
						<h3>Pembayaran</h3>
						<p class="text-danger">Bank BRI. 0123-343-1233-02-1</p>
						<?php echo form_open_multipart('pelanggan/cstatusorder/bayar/' . $detail['transaksi']->id_transaksi); ?>
						<label>Upload Bukti Pembayaran</label>
						<input type="file" name="gambar" class="form-control">
						<button type="submit" class="site-btn mt-3 mb-3">Kirim</button>
						</form>
					<?php
					}
					?>

				</div>
			</div>


			<br>
			<form action="#">
				<div class="row">
					<div class="col-lg-12 col-md-6">
						<div class="checkout__order">
							<h4>Your Order</h4>
							<div class="checkout__order__products">Products <span>Total</span></div>
							<ul>
								<?php
								foreach ($detail['pesanan'] as $key => $value) {
								?>
									<li><?= $value->nama_produk ?> <span>Rp. <?= number_format(($value->harga) * $value->qty) ?></span></li>
								<?php
								}
								?>

							</ul>
							<div class="checkout__order__total">Total <span><?= number_format($detail['transaksi']->total_transaksi) ?></span></div>

							<a href="<?= base_url('pelanggan/cStatusOrder') ?>" class="site-btn">Kembali</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Modal -->
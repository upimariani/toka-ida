<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= base_url('asset/1.jpg') ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Checkout</h2>
					<div class="breadcrumb__option">
						<a href="./index.html">Home</a>
						<span>Checkout</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">

		<div class="checkout__form">
			<h4>Billing Details</h4>
			<form action="<?= base_url('pelanggan/ccheckout/checkout') ?>" method="POST">

				<div class="row">
					<div class="col-lg-8 col-md-6">
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Atas Nama<span>*</span></p>
									<input value="<?= $pelanggan->nama_pelanggan ?>" type="text" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>No Telepon<span>*</span></p>
									<input value="<?= $pelanggan->no_hp ?>" type="text" readonly>
								</div>
							</div>
						</div>
						<p>Dimohon untuk mengisi alamat pengiriman dengan benar.</p>


						<div class="row">
							<div class="col-lg-12 mt-3">
								<div class="checkout__input">
									<p>Alamat Pengiriman<span>*</span></p>
									<input type="text" value="<?= $pelanggan->alamat ?>" name="alamat" placeholder="Masukkan Alamat Lengkap" required>

								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="checkout__order">
							<h4>Your Order</h4>
							<div class="checkout__order__products">Products <span>Total</span></div>
							<ul>
								<?php
								foreach ($this->cart->contents() as $key => $value) {
								?>
									<li><?= $value['name'] ?> <span>Rp. <?= number_format($value['price'] * $value['qty']) ?></span></li>
								<?php
								}
								?>

							</ul>
							<div class="checkout__order__subtotal">TOTAL <span>Rp. <?= number_format($this->cart->total())  ?></span></div>

							<button type="submit" class="site-btn mb-4">CHECKOUT</button>

						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Footer Section Begin -->
<footer class="footer spad">

</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="<?= base_url('asset/ogani-master/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('asset/ogani-master/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/ogani-master/') ?>js/main.js"></script>



</body>

</html>
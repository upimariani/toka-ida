<!-- Hero Section Begin -->
<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="hero__categories">
					<div class="hero__categories__all">
						<i class="fa fa-bars"></i>
						<span>Produk</span>
					</div>
					<ul>
						<li><a href="#">Pakaian Wanita</a></li>
						<li><a href="#">Pakaian Laki - Laki</a></li>
						<li><a href="#">Anak - Anak</a></li>
						<li><a href="#">Muslim</a></li>
						<li><a href="#">Peralatan Rumah Tangga</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="hero__search">
					<div class="hero__search__form">
						<form action="#">
							<div class="hero__search__categories">
								All Categories
								<span class="arrow_carrot-down"></span>
							</div>
							<input type="text" placeholder="What do yo u need?">
							<button type="submit" class="site-btn">SEARCH</button>
						</form>
					</div>
					<div class="hero__search__phone">
						<div class="hero__search__phone__icon">
							<i class="fa fa-phone"></i>
						</div>
						<div class="hero__search__phone__text">
							<h5>+65 11.188.888</h5>
							<span>support 24/7 time</span>
						</div>
					</div>
				</div>
				<div class="hero__item set-bg" data-setbg="<?= base_url('asset/katalog.jpg') ?>">
					<div class="hero__text">
						<span>FASHION</span>
						<h2>TOKO IDA OLSHOP</h2>
						<p>Free Pickup and Delivery Available</p>
						<a href="#" class="primary-btn">SHOP NOW</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
	<div class="container">
		<div class="row">
			<div class="categories__slider owl-carousel">
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="<?= base_url('asset/1.jpg') ?>">
						<h5><a href="#">Pakaian Wanita</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="<?= base_url('asset/2.jpg') ?>">
						<h5><a href="#">Pakaian Laki - Laki</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="<?= base_url('asset/3.jpg') ?>">
						<h5><a href="#">Anak - Anak</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="<?= base_url('asset/4.jpg') ?>">
						<h5><a href="#">Peralatan Rumah Tangga</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="<?= base_url('asset/5.jpg') ?>">
						<h5><a href="#">Cosmetik</a></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Product</h2>
				</div>

			</div>
		</div>
		<div class="row featured__filter">
			<?php
			foreach ($produk as $key => $value) {
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
					<div class="featured__item">
						<div class="featured__item__pic set-bg" data-setbg="<?= base_url('asset/foto-produk/' . $value->gambar) ?>">
							<ul class="featured__item__pic__hover">
								<li><a href="<?= base_url('Pelanggan/cCart/add/' . $value->id_produk) ?>"><i class="fa fa-shopping-cart"></i></a></li>
							</ul>
						</div>
						<div class="featured__item__text">
							<h6><a href="<?= base_url('Pelanggan/cCart/add/' . $value->id_produk) ?>"><?= $value->nama_produk ?></a></h6>
							<h5>Rp. <?= number_format($value->harga) ?></h5>
						</div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
</section>
<!-- Featured Section End -->
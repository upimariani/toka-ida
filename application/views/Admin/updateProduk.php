<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Kelola Data Produk</h2>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row column1">
			<div class="col-md-12">
				<div class="white_shd full margin_bottom_40">
					<div class="full graph_head">
						<div class="heading1 margin_0 ">
							<h2>Produk</h2>
						</div>
					</div>
					<?php echo form_open_multipart('Admin/cproduk/edit/' . $produk->id_produk); ?>
					<div class="container mt-5 mb-5">
						<br>
						<h3 class="mb-5 mt-5">Create New Product</h3>

						<?= form_error('nama', ' <small class="text-danger mt-0">', '</small>') ?>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-qrcode"></i></span>
							</div>
							<input type="text" value="<?= $produk->nama_produk ?>" class="form-control" name="nama" placeholder="Masukkan Nama Produk" aria-label="Username" aria-describedby="basic-addon1">
						</div>

						<?= form_error('harga', ' <small class="text-danger mt-0">', '</small>') ?>
						<div class="input-group mb-3">
							<input type="text" class="form-control" value="<?= $produk->harga ?>" name="harga" placeholder="Masukkan Harga Produk" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2"><i class="fa fa-tag"></i></span>
							</div>
						</div>
						<?= form_error('harga_supplier', ' <small class="text-danger mt-0">', '</small>') ?>
						<div class="input-group mb-3">
							<input type="text" class="form-control" value="<?= $produk->harga_supplier ?>" name="harga_supplier" placeholder="Masukkan Harga Supplier Produk" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2"><i class="fa fa-tag"></i></span>
							</div>
						</div>

						<label for="basic-url">Deskripsi Produk</label>
						<?= form_error('deskripsi', ' <small class="text-danger mt-0">', '</small>') ?>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">With textarea</span>
							</div>
							<textarea class="form-control" name="deskripsi" aria-label="With textarea"><?= $produk->deskripsi ?></textarea>
						</div>

						<label for="basic-url">Keterangan</label>
						<?= form_error('keterangan', ' <small class="text-danger mt-0">', '</small>') ?>
						<div class="input-group mb-3">
							<textarea class="form-control" name="keterangan" aria-label="With textarea"><?= $produk->keterangan ?></textarea>
						</div>

						<?= form_error('stok', ' <small class="text-danger mt-0">', '</small>') ?>
						<div class="input-group mb-3">
							<input type="text" class="form-control" value="<?= $produk->stok ?>" name="stok" placeholder="Masukkan Stok Produk" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">pcs</span>
							</div>
						</div>
						<img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $produk->gambar) ?>"><br>
						<div class="input-group mb-3">

							<input type="file" class="form-control" name="gambar">
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Save</button>
						<a href="<?= base_url('Admin/cProduk') ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- footer -->

</div>
<!-- end dashboard inner -->
</div>
</div>
<!-- model popup -->
</div>
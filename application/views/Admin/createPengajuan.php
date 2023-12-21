<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Tambah Pengajuan Supplier</h2>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row column1">
			<div class="col-lg-12">
				<div class="white_shd full margin_bottom_40">
					<div class="full graph_head">
						<div class="heading1 margin_0 ">
							<h2>Barang</h2>
						</div>
						<form action="<?= base_url('Admin/cPengajuan/add_to_cart') ?>" method="POST">
							<div class="container mt-5 mb-5">
								<br>
								<h3 class="mb-5 mt-5">Create New Pengajuan</h3>

								<div class="input-group mb-3">
									<select class="form-control" name="barang" required>
										<option value="">---Pilih Barang---</option>
										<?php
										foreach ($barang as $key => $value) {
										?>
											<option value="1"><?= $value->nama_produk ?></option>
										<?php
										}
										?>

									</select>
								</div>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-tag"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="Masukkan Quantity Pengajuan" name="qty">
								</div>



								<button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Save</button>
								<a href="<?= base_url('Admin/cUser') ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
							</div>
						</form>
					</div>

				</div>
			</div>
			<div class="col-lg-12">
				<div class="white_shd full margin_bottom_40">
					<div class="full graph_head">
						<div class="heading1 margin_0 ">
							<h2>User</h2>
						</div>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>Quantity</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($this->cart->contents() as $key => $value) {
							?>
								<tr>
									<td><?= $value['name'] ?></td>
									<td>Rp. <?= number_format($value['price'])  ?></td>
									<td><?= $value['qty'] ?></td>
									<td>Rp. <?= number_format($value['price'] * $value['qty'])  ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
						<form action="<?= base_url('Admin/cPengajuan/selesai') ?>" method="POST">
							<tfoot>
								<tr>
									<td><button type="submit" class="btn btn-success">Selesai</button></td>
									<td><input type="text" name="supplier" class="form-control" placeholder="Masukkan Nama Supplier" required></td>
									<td>
										<h4>Total</h4>
									</td>
									<td>
										<h3>Rp. <?= number_format($this->cart->total())  ?></h3>
									</td>
								</tr>
							</tfoot>
						</form>


					</table>
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
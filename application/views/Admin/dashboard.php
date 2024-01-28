<!-- dashboard inner -->
<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Dashboard</h2>
				</div>
			</div>
		</div>
		<?php
		$pelanggan = $this->db->query("SELECT COUNT(id_pelanggan) as jml_pelanggan FROM `pelanggan`")->row();
		$transaksi = $this->db->query("SELECT COUNT(id_transaksi) as jml_transaksi FROM `transaksi`")->row();
		$produk = $this->db->query("SELECT COUNT(id_produk) as jml_produk FROM `produk`")->row();
		$user = $this->db->query("SELECT COUNT(id_user) as jml_user FROM `user`")->row();
		?>
		<div class="row column1">
			<div class="col-md-6 col-lg-3">
				<div class="full counter_section margin_bottom_30">
					<div class="couter_icon">
						<div>
							<i class="fa fa-user yellow_color"></i>
						</div>
					</div>
					<div class="counter_no">
						<div>
							<p class="total_no"><?= $pelanggan->jml_pelanggan ?></p>
							<p class="head_couter">Pelanggan Register</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="full counter_section margin_bottom_30">
					<div class="couter_icon">
						<div>
							<i class="fa fa-clock-o blue1_color"></i>
						</div>
					</div>
					<div class="counter_no">
						<div>
							<p class="total_no"><?= $transaksi->jml_transaksi ?></p>
							<p class="head_couter">Transaksi</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="full counter_section margin_bottom_30">
					<div class="couter_icon">
						<div>
							<i class="fa fa-cloud-download green_color"></i>
						</div>
					</div>
					<div class="counter_no">
						<div>
							<p class="total_no"><?= $produk->jml_produk ?></p>
							<p class="head_couter">Produk</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="full counter_section margin_bottom_30">
					<div class="couter_icon">
						<div>
							<i class="fa fa-comments-o red_color"></i>
						</div>
					</div>
					<div class="counter_no">
						<div>
							<p class="total_no"><?= $user->jml_user ?></p>
							<p class="head_couter">User</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- table section -->
			<div class="col-md-12">
				<div class="white_shd full margin_bottom_30">
					<div class="full graph_head">
						<div class="heading1 margin_0">
							<h2>Informasi Stok Produk</h2>
						</div>
					</div>
					<?php
					$produk = $this->db->query("SELECT * FROM `produk`")->result();
					?>
					<div class="table_section padding_infor_info">
						<div class="table-responsive-sm">
							<table id="myTable" class="table">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Keterangan</th>
										<th>Stok</th>
										<th>Status</th>
										<th>Pengajuan Barang</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($produk as $key => $value) {
									?>
										<tr>
											<td><img style="width: 50px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"></td>
											<td><?= $value->nama_produk ?></td>
											<td><?= $value->harga ?></td>
											<td><?= $value->keterangan ?></td>
											<td><?= $value->stok ?></td>
											<?php if ($value->stok <= 10) {
											?>
												<td><span class="badge badge-danger">Perbaharui Stok Produk!</span></td>
												<td><a href="<?= base_url('Admin/cPengajuan') ?>" class="btn btn-warning">Pengajuan</a></td>
											<?php
											} else {
											?>
												<td><span class="badge badge-success">Stok Aman!</span></td>
												<td></td>
											<?php
											} ?>

										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- end dashboard inner -->
	</div>
</div>
</div>
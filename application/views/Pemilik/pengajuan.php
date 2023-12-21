<!-- dashboard inner -->
<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Pengajuan Produk Supplier</h2>
				</div>
			</div>
		</div>
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success" role="alert">
				<?= $this->session->userdata('success') ?>
			</div>
		<?php
		}
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Pemilik/cLapPengajuan/cetak') ?>" method="POST">
							<div class="row">

								<div class="col-lg-6">
									<div class="form-group">
										<select class="form-control" name="bulan">
											<option>---Pilih Bulan Ke- ---</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<select class="form-control" name="tahun">
											<option>---Pilih Tahun Ke- ---</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>

										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<button type="submit" class="btn btn-success">Cetak Laporan</button>
								</div>




							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- row -->
		<div class="row">
			<!-- table section -->
			<div class="col-md-12">
				<div class="white_shd full margin_bottom_30">
					<div class="full graph_head">
						<div class="heading1 margin_0">
							<h2>Informasi Pengajuan Produk</h2>
						</div>
					</div>
					<div class="table_section padding_infor_info">
						<div class="table-responsive-sm">
							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Supplier</th>
										<th>Tanggal Pengajuan</th>
										<th>Total Pengajuan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pengajuan as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nama_supplier ?></td>
											<td><?= $value->tgl_pengajuan ?></td>
											<td>Rp. <?= number_format($value->total_pengajuan) ?></td>
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
	</div>
	<!-- footer -->

</div>
<!-- end dashboard inner -->
</div>
</div>
<!-- model popup -->
</div>
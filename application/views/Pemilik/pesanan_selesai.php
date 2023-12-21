<!-- dashboard inner -->
<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Kelola Transaksi Pelanggan</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Pemilik/cLapTransaksi/cetak') ?>" method="POST">
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
		<div class="row column1">
			<div class="col-md-12">
				<div class="white_shd full margin_bottom_30">
					<div class="full graph_head">
						<div class="heading1 margin_0">
							<h2>Informasi <small>( Pesanan Selesai )</small></h2>
						</div>
					</div>
					<div class="full price_table padding_infor_info">
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive-sm">
									<table id="myTable" class="table table-striped projects">
										<thead class="thead-dark">
											<tr>
												<th style="width: 2%">No</th>
												<th style="width: 30%">Atas Nama</th>
												<th>Tanggal Order</th>
												<th>Total Order</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($transaksi['selesai'] as $key => $value) {
											?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $value->nama_pelanggan ?></td>
													<td><?= $value->tgl_transaksi ?></td>
													<td>Rp.<?= number_format($value->total_transaksi) ?></td>
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
			<!-- end row -->
		</div>
		<!-- footer -->

	</div>
	<!-- end dashboard inner -->
</div>
</div>
</div>
</div>
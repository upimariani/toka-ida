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
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success" role="alert">
				<?= $this->session->userdata('success') ?>
			</div>
		<?php
		}
		?>
		<!-- row -->
		<div class="row column1">
			<div class="col-md-12">
				<div class="white_shd full margin_bottom_30">
					<div class="full graph_head">
						<div class="heading1 margin_0">
							<h2>Informasi <small>( Konfirmasi Pembayaran )</small></h2>
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
												<th>Konfirmasi Pembayaran</th>
												<th>Detail</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($transaksi['konfirmasi'] as $key => $value) {
											?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $value->nama_pelanggan ?></td>
													<td><?= $value->tgl_transaksi ?></td>
													<td>Rp.<?= number_format($value->total_transaksi) ?></td>
													<td><a class="btn btn-success" href="<?= base_url('admin/ctransaksi/konfirmasi_pembayaran/' . $value->id_transaksi) ?>">Konfirmasi</a></td>
													<td><a href="<?= base_url('admin/ctransaksi/detail_pesanan/' . $value->id_transaksi) ?>" class="btn btn-warning"><i class="fa fa-info"></i></a></td>
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
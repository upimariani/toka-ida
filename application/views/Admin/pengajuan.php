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
		<a href="<?= base_url('Admin/cPengajuan/create') ?>" class="btn btn-success mb-3">Tambah Pengajuan Produk</a>
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
										<th>Action</th>
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

											<td><a href="<?= base_url('admin/cpengajuan/detail/' . $value->id_pengajuan) ?>" class="btn btn-outline-info"><i class="fa fa-info"></i></a>
											</td>
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
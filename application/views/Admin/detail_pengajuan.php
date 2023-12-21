<!-- dashboard inner -->
<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Detail Pesanan <small>( <?= $detail['transaksi']->id_pengajuan ?> )</small></h2>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<!-- invoice section -->
			<div class="col-md-12">
				<div class="white_shd full margin_bottom_30">
					<div class="full graph_head">
						<div class="heading1 margin_0">
							<h2><i class="fa fa-file-text-o"></i> Invoice</h2>
						</div>
					</div>
					<div class="full">
						<div class="invoice_inner">
							<div class="row">
								<div class="col-md-6">
									<div class="full invoice_blog padding_infor_info padding-bottom_0">
										<h4>To</h4>
										<p><strong><?= $detail['transaksi']->nama_supplier ?></strong>


										</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="full invoice_blog padding_infor_info padding-bottom_0">
										<h4>Invoice No - #<?= $detail['transaksi']->id_pengajuan ?> </h4>
										<p><strong>Order ID : </strong><?= $detail['transaksi']->id_pengajuan ?><br>
											<strong>Payment Due : </strong><?= $detail['transaksi']->tgl_pengajuan ?>
										</p>


									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="full padding_infor_info">
						<div class="table_row">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Qty</th>
											<th>Product</th>
											<th>Harga #</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($detail['pesanan'] as $key => $value) {
										?>
											<tr>
												<td><?= $value->qty ?></td>
												<td><?= $value->nama_produk ?></td>
												<td>Rp. <?= number_format($value->harga)  ?></td>
												<td>Rp. <?= number_format($value->harga * $value->qty)  ?></td>
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
		<!-- row -->
		<div class="row">
			<div class="col-md-6">

			</div>
			<div class="col-md-6">
				<div class="full white_shd">
					<div class="full graph_head">
						<div class="heading1 margin_0">
							<h2>Total Amount</h2>
						</div>
					</div>
					<div class="full padding_infor_info">
						<div class="price_table">
							<div class="table-responsive">
								<table class="table">
									<tbody>

										<tr>
											<th>Total:</th>
											<td>Rp. <?= number_format($detail['transaksi']->total_pengajuan) ?></td>
										</tr>
										<tr>
											<td><a class="btn btn-warning" href="<?= base_url('Admin/cPengajuan/cetak/' . $detail['transaksi']->id_pengajuan) ?>">Cetak Pengajuan</a></td>
										</tr>
									</tbody>
								</table>
							</div>
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
<!-- The Modal -->

<!-- end model popup -->
</div>
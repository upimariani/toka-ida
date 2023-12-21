<!-- dashboard inner -->
<div class="midde_cont">
	<div class="container-fluid">
		<div class="row column_title">
			<div class="col-md-12">
				<div class="page_title">
					<h2>Kelola Data User</h2>
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
		<a href="<?= base_url('Admin/cUser/createuser') ?>" class="btn btn-success mb-3">Create User</a>
		<!-- row -->
		<div class="row">
			<!-- table section -->
			<div class="col-md-12">
				<div class="white_shd full margin_bottom_30">
					<div class="full graph_head">
						<div class="heading1 margin_0">
							<h2>Informasi User Akun</h2>
						</div>
					</div>
					<div class="table_section padding_infor_info">
						<div class="table-responsive-sm">
							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Password</th>
										<th>Level User</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($user as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nama ?></td>
											<td><?= $value->username ?></td>
											<td><?= $value->password ?></td>
											<td><?php
												if ($value->level_user == '1') {
													echo '<span class="badge badge-info">Admin</span>';
												} else if ($value->level_user == '2') {
													echo '<span class="badge badge-success">Pemilik</span>';
												}
												?></td>
											<td><a href="<?= base_url('admin/cuser/delete/' . $value->id_user) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
												<a href="<?= base_url('admin/cuser/update/' . $value->id_user) ?>" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
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
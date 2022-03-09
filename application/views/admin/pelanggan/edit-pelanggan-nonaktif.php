<div class="clearfix"></div>

<div class="row">

	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= $subtitle ?></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>

			</div>
			<a href="<?= base_url('admin/pelanggan') ?>" class="btn btn-outline-primary btn-sm float-right">Kembali</a>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<form method="post" action="<?= base_url('admin/pelanggan/proses_edit_pelanggan_nonaktif/') ?><?= $pelanggan->id_pelanggan ?>">

								<div class="form-group">
									<select class="form-control" name="status_pelanggan">
										<option>Status</option>
										<option value="aktif" <?= $pelanggan->status_pelanggan == 'aktif' ? 'selected' : '' ?>>Aktif</option>
										<option value="nonaktif" <?= $pelanggan->status_pelanggan == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
									</select>
								</div>
								<button type="submit" class="btn btn-outline-secondary"><i class="fa fa-edit"></i>Update</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- endrow -->
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
							<form method="post" action="<?= base_url('admin/pelanggan/proses_tambah_pelanggan') ?>">
								<div class="form-group">
									<label for="">Nama Pelanggan</label>
									<input type="text" name="nama_pelanggan" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="">Alamat Pelanggan</label>
									<textarea class="form-control" name="alamat_pelanggan" required></textarea>
									<p style="color: red;">Isi Alamat Dengan Lengkap</p>
								</div>
								<div class="form-group">
									<label for="">Telepon Pelanggan</label>
									<input type="number" name="telepon_pelanggan" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="">Email Pelanggan</label>
									<input type="email" name="email_pelanggan" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="">Password Pelanggan</label>
									<input type="text" name="password_pelanggan" class="form-control" required>
								</div>
								<input type="hidden" name="level" value="2">
								<input type="hidden" name="status_pelanggan" value="aktif">
								<button type="submit" class="btn btn-outline-secondary"><i class="fa fa-save"></i>Tambah</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- endrow -->


<div class="clearfix"></div>
<?php if($this->session->flashdata('pesan') !== null){ ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Notif!</strong><?= $this->session->flashdata('pesan') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>

<?php if($this->session->flashdata('eror') !== null){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Notif!</strong><?= $this->session->flashdata('eror') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>
<div class="row">

	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= $subtitle ?></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Settings 1</a>
							<a class="dropdown-item" href="#">Settings 2</a>
						</div>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>

			</div>
			<a href="<?= base_url('admin/pengaturan/tambah_banner_footer') ?>" class="btn btn-outline-secondary btn-sm float-right">Tambah Banner Footer</a>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">

							<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Gambar</th>
										<th>Teks</th>
										<th>opsi</th>
									</tr>
								</thead>


								<tbody>
									<?php
									$no=1; 
									foreach($footer as $result){ ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><img src="<?= base_url('assets/img/') ?><?= $result->gambar ?>" style="width:80px;"></td>
										<td><?= $result->teks ?></td>
										<td>
											<a href="" class="bt btn-secondary btn-sm"><i class="fa fa-edit"></i></a>

											<a href="" class="bt btn-danger btn-sm"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- endrow -->

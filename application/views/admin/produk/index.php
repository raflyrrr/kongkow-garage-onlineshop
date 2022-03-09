<div class="clearfix"></div>
<?php if ($this->session->flashdata('pesan') !== null) { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Notif!</strong><?= $this->session->flashdata('pesan') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>

<?php if ($this->session->flashdata('eror') !== null) { ?>
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
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>

			</div>
			<a href="<?= base_url('admin/produk/tambah_produk') ?>" class="btn btn-outline-secondary btn-sm float-right">Tambah Produk</a>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">

							<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Kategori</th>
										<th>Berat</th>
										<th>Harga</th>
										<th>Gambar</th>
										<th>Stok</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>


								<tbody>
									<?php $no = 1;
									foreach ($produk as $result) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $result->nama_produk ?></td>
											<td><?= $result->slug_kategori ?></td>
											<td><?= $result->berat ?> gr</td>
											<td><?= $result->harga_produk ?></td>
											<td><img src="<?= base_url('assets/img/') ?><?= $result->gambar ?>" style="width:80px;"></td>
											<td><?= $result->stok ?></td>
											<td><?= $result->status_produk ?></td>
											<td>
												<a href="<?= base_url('admin/produk/edit_produk/') ?><?= $result->id_produk ?>" class="bt btn-secondary btn-sm"><i class="fa fa-edit"></i></a>

												<a href="<?= base_url('admin/produk/hapus_produk/') ?><?= $result->id_produk ?>" class="bt btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
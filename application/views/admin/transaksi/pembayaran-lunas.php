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
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Produk</th>
											<th>Qty</th>
											<th>Harga</th>
											<th>Sub Total</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($lunas as $result) { ?>
											<tr>
												<td><?= $result->nama_produk ?></td>
												<td><?= $result->qty ?></td>
												<td>Rp.<?= number_format($result->harga_produk) ?></td>
												<td>Rp.<?= number_format($result->qty * $result->harga_produk) ?></td>
											</tr>
										<?php } ?>
									</tbody>
									<tr>
										<td></td>
										<td>Expedisi</td>
										<td>Ongkir</td>
										<td>Total Bayar</td>
									</tr>
									<tr>
										<td></td>
										<td><?= $result->expedisi ?> | <?= $result->package ?></td>
										<td>Rp.<?= number_format($result->ongkir) ?></td>
										<td>Rp.<?= number_format($result->total_bayar) ?></td>
									</tr>
								</table>
							</div>
							<div class="card-body">
								<div class="row">

									<div class="col-md-6">
										<label>Status Pesanan</label>
										<form action="<?= base_url('admin/konfirmasi/pembayaran/lunas/update/status_pesanan/') ?><?= $result->invoice ?>" method="post">
											<select class="form-control" name="status_pesanan">

												<option value="konfirmasi" <?= $result->status_pesanan == 'konfirmasi' ? 'selected' : '' ?>>konfirmasi</option>
												<option value="proses" <?= $result->status_pesanan == 'proses' ? 'selected' : '' ?>>proses</option>
												<option value="delivery" <?= $result->status_pesanan == 'delivery' ? 'selected' : '' ?>>delivery</option>
											</select>
											<button type="submit" class="btn btn-primary btn-xs mt-2">update</button>
										</form>
									</div>

								</div>
								<div class="row">
									<div class="col-md-4">
										<label>Pelanggan</label>
										<input type="text" class="form-control" readonly value="<?= $result->nama_pelanggan ?>">
									</div>
									<div class="col-md-4">
										<label>Penerima</label>
										<input type="text" class="form-control" readonly value="<?= $result->nama_penerima ?>">
									</div>

									<div class="col-md-4">
										<label>Telpon Penerima</label>
										<input type="text" class="form-control" readonly value="<?= $result->telepon_penerima ?>">
									</div>
									<div class="col-md-4">
										<label>Provinsi</label>
										<input type="text" class="form-control" readonly value="<?= $result->province ?>">
									</div>
									<div class="col-md-4">
										<label>Kota</label>
										<input type="text" class="form-control" readonly value="<?= $result->city ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>Alamat</label>
										<textarea class="form-control" rows="5" readonly=""><?= $result->alamat_penerima ?></textarea>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<label>Bukti TRF</label> <br>
										<img src="<?= base_url('assets/img/bukti/') ?><?= $result->bukti ?>" style="width:300px;">
									</div>
									<div class="col-md-4">
										<label>Bank</label> <br>
										<input type="text" readonly value="<?= $result->bank ?>" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Atas Nama</label> <br>
										<input type="text" readonly value="<?= $result->atas_nama ?>" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Jumlah</label> <br>
										<input type="text" readonly value="<?= $result->jumlah ?>" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Tanggal Konfirmasi</label> <br>
										<input type="text" readonly value="<?= $result->created ?>" class="form-control">
									</div>

								</div> <br>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- endrow -->
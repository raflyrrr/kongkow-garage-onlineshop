<!DOCTYPE html>
<html lang="en">

<head>
	<title>Kongkow Garage &mdash; Detail Produk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>fonts/icomoon/style.css">

	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/magnific-popup.css">
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/jquery-ui.css">
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/owl.theme.default.min.css">


	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/aos.css">

	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/style.css">

</head>

<body>

	<div class="site-wrap">
		<header class="site-navbar" role="banner">
			<div class="site-navbar-top">
				<div class="container">
					<div class="row align-items-center">

						<div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
						</div>

						<div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
							<div class="site-logo">
								<a href="" class="js-logo-clone">Kongkow Garage</a>
							</div>
						</div>
						<?php $keranjang = $this->cart->contents();
						$jml_item = 0;

						foreach ($keranjang as $key => $value) {
							$jml_item = $jml_item + $value['qty'];
						} ?>
						<div class="col-6 col-md-4 order-3 order-md-3 text-right">
							<div class="site-top-icons">
								<ul>
									<li>
										<a href="<?= base_url('cart/keranjang') ?>" class="site-cart">
											<span class="icon icon-shopping_cart"></span>
											<span class="count"><?= $jml_item ?></span>
										</a>
									</li>
									<li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
			<nav class="site-navigation text-right text-md-center" role="navigation">
				<div class="container">
					<ul class="site-menu js-clone-nav d-none d-md-block">
						<li class="">
							<a href="">Home</a>
						</li>
						<li class="has-children"><a href="">Kategori</a>
							<ul class="dropdown">
								<?php foreach ($kategori as $result) { ?>
									<li><a href="<?= base_url('produk/p/kategori/') ?><?= $result->slug_kategori ?>"><?= $result->nama_kategori ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<?php if ($this->session->userdata('id_pelanggan') !== null) { ?>
							<li class="has-children">
								<a href=""><?= $this->session->userdata('nama_pelanggan') ?></a>
								<ul class="dropdown">
									<li><a href="<?= base_url('riwayat/p/pesanan') ?>">Tagihan</a></li>
									<li><a href="<?= base_url('logout') ?>">Logout</a></li>
								</ul>
							</li>
						<?php } else { ?>
							<li><a href="<?= base_url('auth') ?>">Login</a></li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</header>

		<div class="bg-light py-3">
			<div class="container">
				<div class="row">
					<div class="col-md-12 mb-0"><a href="<?= base_url('/') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?= $detail->nama_produk ?></strong></div>
				</div>
			</div>
		</div>

		<div class="site-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="<?= base_url('assets/img/') ?><?= $detail->gambar ?>" alt="Image" class="img-fluid">
					</div>


					<div class="col-md-6">
						<?php
						echo form_open('cart/tambah');
						echo form_hidden('id', $detail->id_produk);
						echo form_hidden('weight', $detail->berat);
						echo form_hidden('qty', 1);
						echo form_hidden('price', $detail->harga_produk);
						echo form_hidden('name', $detail->nama_produk);
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
						?>
						<h2 class="text-black"><?= $detail->nama_produk ?></h2>
						<p><?= $detail->deskripsi_produk ?></p>

						<p><strong class="text-primary h4">Rp.<?= number_format($detail->harga_produk) ?></strong></p>
						<?php if ($detail->stok == 0) { ?>
							<p>Maaf stok habis</p>
						<?php } else { ?>
							<p>Stok : <?= $detail->stok ?></p>

							<p><button type="submit" class="btn btn-outline-primary">tambah keranjang</button></p>

						<?php } ?>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="site-section block-3 site-blocks-2 bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 site-section-heading text-center pt-4">
						<h2>Produk Unggulan</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="nonloop-block-3 owl-carousel">
							<?php foreach ($produk as $key => $value) { ?>
								<?php
								echo form_open('cart/tambah');
								echo form_hidden('id', $value->id_produk);
								echo form_hidden('weight', $value->berat);
								echo form_hidden('qty', 1);
								echo form_hidden('price', $value->harga_produk);
								echo form_hidden('name', $value->nama_produk);
								echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
								?>
								<div class="item">
									<div class="block-4 text-center">
										<figure class="block-4-image">
											<img src="<?= base_url('assets/img/') ?><?= $value->gambar ?>" alt="Image placeholder" class="img-fluid">
										</figure>
										<div class="block-4-text p-4">
											<h3><a href="<?= base_url('detail/p/produk/') ?><?= $value->slug_produk ?>"><?= $value->nama_produk ?></a></h3>
											<p class="text-primary font-weight-bold">Rp.<?= number_format($value->harga_produk) ?></p>
											<?php if ($value->stok == 0) { ?>
												<p>mohon maaf stok habis</p>
											<?php } else { ?>
												<p class="mb-0">Stok: <?= $value->stok ?></p>

												<button type="submit" class="btn btn-outline-primary">tambah keranjang</button>
											<?php } ?>
										</div>
									</div>
								</div>

								<?php echo form_close(); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="site-footer border-top">
			<div class="container">
				<div class="row pt-5 mt-2 text-center">
					<div class="col-md-12">
						<p>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
							<script>
								document.write(new Date().getFullYear());
							</script> by <a href="" target="_blank" class="text-primary">Kongkow Garage</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
					</div>

				</div>
			</div>
		</footer>
	</div>

	<script src="<?= base_url('assets/front/') ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets/front/') ?>js/jquery-ui.js"></script>
	<script src="<?= base_url('assets/front/') ?>js/popper.min.js"></script>
	<script src="<?= base_url('assets/front/') ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/front/') ?>js/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/front/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('assets/front/') ?>js/aos.js"></script>

	<script src="<?= base_url('assets/front/') ?>js/main.js"></script>

</body>

</html>
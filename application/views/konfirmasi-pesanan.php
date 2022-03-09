<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kongkow Garage - History Pesanan <?= $this->session->userdata('nama_pelanggan') ?></title>
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
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="<?= base_url('/') ?>" class="js-logo-clone">Kongkow Garage</a>
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
          <div class="col-md-12 mb-0"><a href="<?= base_url('/') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Riwayat pesanan</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>


                    <th class="Produk">Produk</th>
                    <th class="qty">qty</th>
                    <th class="harga">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($belumbayar as $result) { ?>
                    <tr>
                      <td class="Produk"><?= $result->nama_produk ?>
                      </td>
                      <td><?= $result->qty ?></td>
                      <td>Rp.<?= number_format($result->harga_produk) ?></td>

                    </tr>
                  <?php } ?>
                </tbody>
                <tr>
                  <th>Subtotal</th>
                  <th>Ongkir</th>
                  <th>Jumlah Bayar</th>
                </tr>
                <tr>
                  <td><?= $result->grand_total ?></td>
                  <td>Rp.<?= number_format($result->ongkir) ?>-,</td>
                  <td>RP.<?= number_format($result->total_bayar) ?>-,</td>
                </tr>
              </table>
            </div>
          </form>


        </div>
        <form method="post" enctype="multipart/form-data" action="<?= base_url('konfirmasi/proses-konfirmasi') ?>">
          <div class="form-group">
            <label>Invoice</label>
            <input type="text" readonly name="invoice" class="form-control" value="<?= $result->invoice ?>">
          </div>
          <input type="hidden" name="id_pelanggan" value="<?= $this->session->userdata('id_pelanggan') ?>">
          <div class="form-group">
            <select class="form-control" name="bank">
              <option value="bca-3121213131">BCA (3121213131)</option>
            </select>
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="atas_nama" class="form-control" required>
            <p style="color: red;">Atas nama yang melakukan transfer</p>
          </div>

          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
            <p style="color: red;">Nominal yang ditransferkan</p>
          </div>

          <div class="form-group">
            <label>Bukti</label>
            <input type="file" name="foto" class="form-control">
            <p style="color: red;">Lampirkan bukti transfer,kami tidak akan proses jika bukti transfer tidak terlampir</p>
          </div>
          <input type="hidden" name="status" value="konfirmasi">
          <button type="submit" class="btn btn-sm btn-primary">konfirmasi</button>
        </form>
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
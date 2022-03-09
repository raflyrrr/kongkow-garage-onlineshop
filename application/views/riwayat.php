<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kongkow Garage - Tagihan Pesanan <?= $this->session->userdata('nama_pelanggan') ?></title>
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

                    <th class="Invoice">Invoice</th>
                    <th class="Tanggal">Tanggal</th>
                    <th class="Status">Status</th>
                    <th class="opsi">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($riwayat as $result) { ?>
                    <tr>
                      <td class="Invoice">
                        <?= $result->invoice ?>
                      </td>
                      <td class="tanggal"><?= $result->tanggal_order ?>
                      </td>
                      <td><label class="btn btn-sm btn-danger" style="color: white;"><?= $result->status_pesanan ?></label></td>
                      <td>
                        <?php if ($result->status_pesanan == "konfirmasi" or $result->status_pesanan ==  "proses") { ?>
                          <label style="color:red;">Sudah Konfirmasi</label>
                        <?php } else { ?>
                          <a href="<?= base_url('pesanan/p/konfirmasi/') ?><?= $result->invoice ?>" class="btn btn-outline-primary btn-sm">konfirmasi</a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php }  ?>
                </tbody>
              </table>
            </div>
          </form>
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
    </footer>s
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
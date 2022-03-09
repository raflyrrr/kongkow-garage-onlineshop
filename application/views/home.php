<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kongkow Garage</title>
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
                <a href="<?= base_url('/') ?>" class="js-logo-clone">KONGKOW GARAGE</a>
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
      <?php if ($this->session->flashdata('konfirmasi') !== null) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Notif!</strong><?= $this->session->flashdata('konfirmasi') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } ?>
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active">
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
    <?php if ($this->session->flashdata('pesan') !== null) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Notif!</strong><?= $this->session->flashdata('pesan') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>

    <div class="site-blocks-cover" style="background-image: url(<?= base_url('assets/img/banner.jpg') ?>);" data-aos="fade">

    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Delivery</h2>
              <p>Pengeriman cepat, tepat dan aman</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Quality</h2>
              <p>Kualitas produk sangat baik</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>Pelayanan yang sigap</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
          <?php foreach ($kategori_gambar as $result) { ?>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-3 mb-lg-0" data-aos="fade" data-aos-delay="">
              <a class="block-2-item" href="<?= base_url('produk/p/kategori/') ?><?= $result->slug_kategori ?>">
                <figure class="image">
                  <img src="<?= base_url('assets/img/') ?><?= $result->gambar ?>" alt="" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="text-uppercase">Koleksi</span>
                  <h3><?= $result->slug_kategori ?></h3>
                </div>
              </a>
            </div>
          <?php } ?>
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
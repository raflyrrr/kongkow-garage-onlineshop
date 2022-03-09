<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kongkow Garage &mdash; Checkout</title>
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
          <div class="col-md-12 mb-0"><a href="<?= base_url('/') ?>">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?= base_url('cart/keranjang') ?>">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="table table-responsive">
              <table class="table">
                <tr>
                  <td>Produk</td>
                  <td>Berat</td>
                  <td>Harga</td>
                  <td>Qty</td>
                  <td>SubTotal</td>

                </tr>
                <?php
                $keranjang = $this->cart->contents();
                $totweight = 0;
                foreach ($keranjang as $key => $value) { ?>
                  <tr>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['weight'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><?= $value['qty'] ?></td>
                    <td>Rp.<?php echo $this->cart->format_number($value['subtotal']); ?></td>

                  </tr>
                <?php
                  $totweight = $totweight + $value['weight'];
                } ?>
                <tr>

                  <td></td>
                  <td>Total berat</td>
                  <td>Sub Total</td>
                  <td>Ongkir</td>

                </tr>
                <tr>

                  <td></td>
                  <td><?= $totweight ?>(gr)</td>
                  <td>Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                  <td><label id="ongkir"></label></td>
                  <td>GrandTotal:<strong>Rp.<label id="paymentotal"></label></strong></td>
                </tr>
              </table>
            </div>
            <div class="col-md-12">
              <!-- proses menyimpan data transaksi -->
              <form method="post" action="<?= base_url('cart/proses') ?>">

                <?php $keranjang = $this->cart->contents();


                foreach ($keranjang as $key => $value) {
                } ?>
                <?php $i = 1;
                foreach ($keranjang as $key => $value) { ?>

                  <input type="hidden" name="id_produk" value="<?= $value['id'] ?>">

                  <input type="hidden" name="nama_produk" value="<?= $value['name'] ?>">
                  <input type="hidden" name="harga_produk" value="<?= $value['price'] ?>">
                  <?php echo form_hidden('qty' . $i++, $value['qty']) ?>
                  <input type="hidden" name="total" value="<?php echo $this->cart->format_number($this->cart->total()); ?>">

                <?php } ?>
                <div class="form-group">
                  <input type="hidden" name="id_pelanggan" value="<?= $this->session->userdata('id_pelanggan') ?>">
                </div>
                <div class="form-group">
                  <select class="form-control" name="province" required>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" name="city" required>


                  </select>
                </div> <br>
                <div class="form-group">
                  <input type="text" name="nama_penerima" placeholder="Nama Penerima" class="form-control" required>
                </div>

                <div class="form-group">
                  <input type="text" name="telepon_penerima" class="form-control" placeholder="Telepon" required>
                  <p style="color: red;">Nomor Telpon Penerima</p>
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="5" name="alamat_penerima" required></textarea>
                  <p style="color: red;">Alamat Lengkap Penerima</p>
                </div>

                <div class="form-group">
                  <input type="text" name="kode_pos" class="form-control" placeholder="kodepos">
                </div>
                <div class="form-group">
                  <select class="form-control" name="expedisi" required>

                  </select>
                </div>

                <div class="form-group">
                  <select class="form-control" name="package" required>

                  </select>
                </div>


                <input type="hidden" name="ongkir">
                <input type="hidden" name="total_bayar">
                <div class="form-group">
                  <button type="submit" class="btn btn-outline-primary">Process Checkout</button>
                </div>
              </form>
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/province') ?>",
        success: function(result_province) {
          // console.log(result_province);
          $("select[name=province]").html(result_province);
        }
      });
      $("select[name=province]").on("change", function() {
        var id_selected = $("option:selected", this).attr("id_province");

        $.ajax({
          type: "POST",
          url: "<?= base_url('rajaongkir/city') ?>",
          data: 'id_province=' + id_selected,
          success: function(result_city) {
            // console.log(result_city);
            $("select[name=city]").html(result_city);
          }
        });
      });

      $("select[name=city]").on("change", function() {

        $.ajax({
          type: "POST",
          url: "<?= base_url('rajaongkir/expedisi') ?>",

          success: function(result_expedisi) {
            // console.log(result_city);
            $("select[name=expedisi]").html(result_expedisi);
          }
        });
      });

      $("select[name=expedisi]").on("change", function() {
        var expedisi_get = $("select[name=expedisi]").val()
        var city_get = $("option:selected", "select[name=city]").attr('id_city')
        var weight_get = <?= $totweight ?>;

        $.ajax({
          type: "POST",
          url: "<?= base_url('rajaongkir/package') ?>",
          data: 'expedisi=' + expedisi_get + '&id_city=' + city_get + '&weight=' + weight_get,
          success: function(result_package) {
            // console.log(result_package);
            $("select[name=package]").html(result_package);
          }
        });

      });


      $("select[name=package]").on("change", function() {
        var dataongkir = $("option:selected", this).attr('ongkir');

        $("#ongkir").html(dataongkir)

        var datatotalpayment = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);

        $("#paymentotal").html(datatotalpayment);

        $("input[name=ongkir]").val(dataongkir);
        $("input[name=total_bayar]").val(datatotalpayment);
      });
      ///menampilkan ongkkir di input



    });
  </script>

</body>

</html>
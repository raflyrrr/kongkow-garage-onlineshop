
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Socana Indonesia Shop - Cara Konfirmasi Pesanan </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="author" content="Socana Indonesia Official">
  <meta name="description" content="socana indonesia merupakan brand butik muslim lokal ternama dari Indonesia yang sudah memiliki ratusan ribu konsumer dari berbagai daerah di Indonesia bahkan luar negeri. socana indonesia dikenal oleh kalangan remaja sampai dewasa seperti anak SMA, mahasiwa baru, mahasiswa abadi, pecinta musik, atlet olahraga ekstrim, supporter sepak bola, traveller, pekerja kantoran, hingga entrepreneur. Socana Indonesia mudah dikenal karena kualitas yang maksimal dan harganya yang dapat terjangkau oleh semua kalangan. Tidak hanya daily wear, Socana Indonesia memiliki banyak produk untuk memenuhi kebutuhan fashion Kamu, seperti dress, Khimar,hijab, pashmina, daster, piyama dan aksesoris lainnya. Pilih produk berkualitas dari berbagai model dan warna sesuai gaya Kamu untuk menunjang aktivitas Kamu seperti menonton konser, kuliah, sekolah, ngedate, hangout, nongkrong, bekerja, bermain, travelling, hingga menghadiri undangan pernikahan. Kamu juga dapat memaksimalkan gayamu dengan memiliki beberapa perlengkapan fashion dari Socana Indonesia. Padukan outfit favorit Kamu agar tampil maksimal. Miliki produk Socana Indonesia kapanpun Kamu mau dan dimanapun Kamu berada. Kamu bisa melakukan pemesanan melalui berbagai platform dan marketplace seperti official website Socana Indonesia, Shopee, Tokopedia, Bukalapak, Zalora, Lazada, JD.ID, dan Blibli.com.Daerah-daerah lain tidak perlu khawatir karena Socana Indonesia bermitra dengan banyak reseller-reseller resmi yang terpercaya dan tersebar di banyak daerah di Indonesia. Nikmati kemudahan dan kenyamanan bertransaksi bersama mitra-mitra Socana Indonesia yang terjamin dan terpercaya. Jika terjadi masalah seperti salah ukuran, terdapat sedikit cacat produk, atau produk yang tidak sesuai pesanan, bisa menghubungi crew melalui Email, Instagram, Line.  Jadikanlah pengelaman berbelanja Kamu menjadi aktivitas yang menyenangkan dengan gratis ongkir ke segala penjuru Indonesia minimal pembelian 500ribu. Nantikan juga promo menarik Socana Indonesia yang tidak pernah berhenti setiap minggunya.Socana Indonesia adalah produk orisinil karya anak bangsa.">
  <meta name="keywords" content="Brand dedicated to Fashion,Life Fun And Style" />
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
                <a href="<?= base_url('/') ?>" class="js-logo-clone">Socana Indonesia</a>
              </div>
            </div>
            <?php $keranjang = $this->cart->contents();
            $jml_item = 0;

            foreach ($keranjang as $key => $value) { 
              $jml_item = $jml_item + $value['qty'];
            }?>
            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
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
            <li class="has-children active">
              <a href="">Home</a>
              <ul class="dropdown">
                <?php foreach($kategori as $result){ ?>
                  <li><a href="<?= base_url('produk/p/kategori/') ?><?= $result->slug_kategori ?>"><?= $result->nama_kategori ?></a></li>
                <?php } ?>
                <li class="has-children">
                  <a href="#">Sub Menu</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-children">
              <a href="<?= base_url('tentang/p/deskripsi') ?>">Tentang</a>
            </li>
            <li><a href="">Shop</a></li>
            <li><a href="#">Katalog</a></li>
            <li><a href="<?= base_url('tentang/p/kontak') ?>">Kontak</a></li>
            <?php if($this->session->userdata('id_pelanggan') !== null){ ?>
              <li class="has-children">
                <a href=""><?= $this->session->userdata('nama_pelanggan') ?></a>
                <ul class="dropdown">
                  <<li><a href="<?= base_url('riwayat/p/pesanan') ?>">Tagihan</a></li>
                  <li><a href="#">Profile</a></li>
                  <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                </ul>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?= base_url('/') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cara konfirmasi pembayaran</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <div class="card">
              	<div class="card-body">
              		<h3>Untuk Konfirmasi pembayaran via website</h3>
              		<ul>
              			<li>Login terlebih dahulu</li>
              			<li>Lalu masuk kehalaman <a href="">riwayat</a></li>
              			<li>Lalu pilih Invoice yang akan kamu bayar</li>
              			<li>Isi semua formulir konfirmasi pembayaran</li>
              			<li>Screenshot atau poto bukti pembayaran</li>
              			<li>Lampirkan bukti pembayaran dalam formulir</li>
              		</ul>

              		<h3>Untuk Konfirmasi pembayaran via Whatsapp</h3>
              		<ul>
              			<li>Lakukan pembayaran untuk invoice pesanan anda</li>
              			<li>Simpan bukti struk/screenshot pembayaran</li>
              			<li>Lalu konfirmasi via wa <a href=""></a></li>
              			<li>Isi form dalam wa dengan jelas</li>
              			<li>Lampirkan bukti pembayaran dalam formulir</li>
              		</ul>
              	</div>
              </div>
              <i>Note</i>
              <ul>
               <li> <p style="color: red;">Setelah melakukan konfirmasi pembayaran ,tunggu 20 s/d 30 menit admin kami akan cek pembayaran anda </p>
               </li>
               <li>
                 <p style="color: red;">Setelah di cek dan valid maka pesanan anda akan diproses</p>
               </li>
             </ul>
           </div>
         </form>
       </div>
     </div>
   </div>

   <footer class="site-footer border-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="row">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Temukan Kami</h3>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Shopee</a></li>
                <li><a href="#">Bukalapak</a></li>
                <li><a href="#">Tokopedia</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Whatsapp</a></li>
              </ul>
            </div>

            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <?php foreach($produkfooter as $result){ ?>
                  <li><a href="<?= base_url('detail/p/produk/') ?><?= $result->slug_produk ?>"><?= $result->nama_produk ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer-heading mb-4">Promo</h3>
          <a href="#" class="block-6">
              <img src="<?= base_url('assets/img/') ?><?= $bannerfooter->gambar ?>" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Style</h3>
             
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Info Kontak</h3>
              <ul class="list-unstyled">
                <li class="address">Socana Indonesia
Jl. Saturnus Sel.IX,No 20 Blok I, Margasari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286</li>
                <li class="email">info@socanaindonesia.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
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
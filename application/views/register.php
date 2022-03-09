<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register </title>

  <!-- Bootstrap -->
  <link href="<?= base_url('assets/admin/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/admin/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/admin/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= base_url('assets/admin/') ?>vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('assets/admin/') ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <?php if ($this->session->flashdata('pesanerror') !== null) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Notif!</strong><?= $this->session->flashdata('pesanerror') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">

      <div class="animate form login_form">
        <section class="login_content">
          <form method="post" action="<?= base_url('auth/proses_signup') ?>">
            <h1>KONGKOW GARAGE</h1>
            <div class="form-group">
              <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" required="" />
            </div>
            <div class="form-group">
              <textarea class="form-control" name="alamat_pelanggan" rows="5" placeholder="Alamat lengkap" required=""></textarea>
            </div>
            <div class="form-group">
              <input type="number" name="telepon_pelanggan" class="form-control" placeholder="Nomor telepon" required="">
            </div>

            <div class="form-group">
              <input type="email" name="email_pelanggan" class="form-control" placeholder="Email Pelanggan" required="">
            </div>

            <div class="form-group">
              <input type="password" name="password_pelanggan" class="form-control" placeholder="******" required="">
            </div>
            <input type="hidden" name="level" value="2">
            <input type="hidden" name="status_pelanggan" value="nonaktif">
            <button type="submit" class="btn btn-secondary">Signup</button>
          </form>
          <a href="<?= base_url('auth') ?>">have account?</a>
        </section>
      </div>
    </div>
  </div>
</body>

</html>
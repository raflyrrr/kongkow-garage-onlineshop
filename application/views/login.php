<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login </title>

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

  <?php if ($this->session->flashdata('signup') !== null) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Notif!</strong><?= $this->session->flashdata('signup') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>

  <?php if ($this->session->flashdata('notif') !== null) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Notif!</strong><?= $this->session->flashdata('notif') ?>
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
          <form method="post" action="<?= base_url('auth/proses_login') ?>">
            <h1>KONGKOW GARAGE</h1>
            <div>
              <input type="email" name="email_pelanggan" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" name="password_pelanggan" class="form-control" placeholder="Password" required="" />
            </div>
            <button type="submit" name="login" class="btn btn-secondary">LOGIN </button>
          </form>
          <a href="<?= base_url('signup/p/buat-akun') ?>">Create account</a>
        </section>
      </div>
    </div>
  </div>
</body>

</html>
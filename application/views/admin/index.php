<div class="clearfix"></div>
<?php if ($this->session->flashdata('updatestatus') !== null) { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Notif!</strong><?= $this->session->flashdata('updatestatus') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>




<div class="row">

  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Pesanan Baru</h2>
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
              <p class="text-muted font-13 m-b-30">
                Ini data pesanan baru yang masuk dan belum melakukan konfirmasi pembayaran
              </p>
              <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>


                <tbody>
                  <?php foreach ($belumbayar as $result) { ?>
                    <tr>
                      <td><?= $result->invoice ?></td>
                      <td><?= $result->nama_pelanggan ?></td>
                      <td><?= $result->status_pesanan ?></td>
                      <td><?= $result->tanggal_order ?></td>
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



<div class="row">

  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Pesanan Lunas</h2>
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
              <p class="text-muted font-13 m-b-30">
                Ini data pesanan baru yang masuk dan Sudah konfirmasi pembayaran
              </p>
              <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>


                <tbody>
                  <?php foreach ($sudahbayar as $result) { ?>
                    <tr>
                      <td><?= $result->invoice ?></td>
                      <td><?= $result->nama_pelanggan ?></td>
                      <td><?= $result->status_pesanan ?></td>
                      <td><?= $result->tanggal_order ?></td>
                      <td><a href="<?= base_url('admin/konfirmasi/pembayaran/lunas/') ?><?= $result->invoice ?>" class="btn btn-outline-secondary btn-sm">Lihat</a></td>
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
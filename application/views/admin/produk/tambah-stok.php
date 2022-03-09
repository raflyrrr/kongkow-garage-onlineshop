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
      <a href="<?= base_url('admin/produk') ?>" class="btn btn-outline-primary btn-sm float-right">Kembali</a>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <form method="post" action="<?= base_url('admin/produk/proses_tambah_stok') ?>">


                <div class="form-group">
                  <label for="">Nama Produk</label>
                  <select class="form-control" name="id_produk" required>
                    <?php foreach ($produk as $result) { ?>
                      <option value="<?= $result->id_produk ?>"><?= $result->nama_produk ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Stok</label>
                  <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok">
                </div>

                <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-save"></i>Tambah</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- endrow -->
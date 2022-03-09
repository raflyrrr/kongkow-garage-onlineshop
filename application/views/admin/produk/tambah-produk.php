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
              <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/produk/proses_tambah_produk') ?>">
                <div class="form-group">
                  <label for="">Nama Produk</label>
                  <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                </div>

                <div class="form-group">
                  <label for="">Kategori</label>
                  <select class="form-control" name="slug_kategori" required>
                    <?php foreach ($kategori as $result) { ?>
                      <option value="<?= $result->slug_kategori ?>"><?= $result->nama_kategori ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi_produk" rows="5" required></textarea>
                </div>

                <div class="form-group">
                  <label for="">Berat Produk (gr)</label>
                  <input type="number" name="berat" class="form-control" placeholder="Berat Produk" required>
                </div>

                <div class="form-group">
                  <label for="">Harga Produk</label>
                  <input type="number" name="harga_produk" class="form-control" placeholder="Harga Produk" required>
                </div>

                <div class="form-group">
                  <label for="">Foto</label>
                  <input type="file" name="foto" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="">Status Produk</label>
                  <select class="form-control" name="status_produk" required>
                    <option value="publish">Publish</option>
                    <option value="unpublish">Unpublish</option>
                  </select>
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
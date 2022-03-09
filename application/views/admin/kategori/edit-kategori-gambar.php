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
      <a href="<?= base_url('admin/kategori') ?>" class="btn btn-outline-primary btn-sm float-right">Kembali</a>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/kategori/proses_update_kategori_gambar/') ?><?= $kategorigambar->id_poto ?>">


                <div class="form-group">
                  <label for="">Kategori</label>
                  <select class="form-control" name="slug_kategori" required>
                    <option value="<?= $kategorigambar->slug_kategori ?>"><?= $kategorigambar->slug_kategori ?></option>
                    <?php foreach ($kategori as $result) { ?>
                      <option value="<?= $result->slug_kategori ?>"><?= $result->nama_kategori ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Foto</label>
                  <input type="file" name="foto" class="form-control" required>
                  <p style="color: red;">Upload ulang foto untuk menghindari eror foto</p>
                </div>
                <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-edit"></i>Update</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- endrow -->
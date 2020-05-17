<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Tambah Buku Penulis</h2>
          <p class="pageheader-text">Manajemen Buku</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=buku" class="breadcrumb-link">Manajemen Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Buku Penulis </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['penulis']->nama_penulis; ?> </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="ecommerce-widget">
      <div class="row">
        <?php
              if(isset($_GET["success"])){
                  include (ROOT_PATH.'views/bodyview/alert.php');
              }
          ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <h5 class="card-header">Isi kolom dibawah ini</h5>
            <div class="card-body">
              <form action="index.php?hal=bukupenulis&action=simpan" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Nama Penulis</label>
                  <input required disabled name="nama_penulis" id="inputText3" type="text" class="form-control" value="<?= $data['penulis']->nama_penulis; ?>">
                </div>
                <input type="hidden" name="id_penulis" value="<?= $data["penulis"]->id_penulis; ?>">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Daftar Buku</label>
                  <select name="id_buku" class="form-control">
                                      <?php
                                      foreach ($data["buku"] as $k => $buku) {
                                        ?>
                                            <option value="<?= $buku->id_buku ?>">
                                              <?= $buku->nama_buku ?></option>
                                        <?php
                                        }
                                        ?>
                  </select>
                </div>
                <div class="custom-file mb-3">
                  <input type="submit" href="#" class="centerHorizontal btn btn-primary" value="Tambahkan"></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include (ROOT_PATH.'views/bodyview/footer.php'); ?>

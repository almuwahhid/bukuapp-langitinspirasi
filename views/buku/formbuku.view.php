<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title"><?= $data['action'] == "tambah" ? "Tambah Buku" : "Edit Buku"; ?> </h2>
          <p class="pageheader-text">Manajemen Buku</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=buku" class="breadcrumb-link">Manajemen Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['action'] == "tambah" ? "Tambah Buku" : $data['buku']->nama_buku; ?> </li>
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
              <form action="index.php?hal=buku&action=simpan" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Nama Buku</label>
                  <input required name="nama_buku" id="inputText3" type="text" class="form-control" value="<?= $data['action'] == "edit" ? $data['buku']->nama_buku : "" ?>">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Harga</label>
                  <input required name="harga" type="number" step="any" class="form-control" value="<?= $data['action'] == "edit" ? $data['buku']->harga : "" ?>">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Penulis</label>
                  <select name="id_penulis" class="form-control">
                                      <?php
                                      foreach ($data["penulis"] as $k => $penulis) {
                                        ?>
                                            <option value="<?= $penulis->id_penulis ?>"
                                              <?php
                                              if($data['action'] == "edit" && $data['buku']->id_penulis == $penulis->id_penulis)
                                                echo "selected"; ?> >
                                              <?= $penulis->nama_penulis ?></option>
                                        <?php
                                        }
                                        ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Tahun Tebit</label>
                  <input required name="tahun_terbit" type="number" step="any" class="form-control" value="<?= $data['action'] == "edit" ? $data['buku']->tahun_terbit : "" ?>">
                </div>
                <?php
                if($data['action'] == "edit"){
                  ?>
                    <input type="hidden" name="id" value="<?= $data["buku"]->id_buku ?>">
                    <input type="hidden" name="action" value="edit">
                    <div class="custom-file mb-3">
                      <input type="submit" href="#" class="centerHorizontal btn btn-primary" value="Ubah"></a>
                    </div>
                  <?php
                } else {?>
                  <input type="hidden" name="action" value="tambah">
                  <div class="custom-file mb-3">
                    <input type="submit" href="#" class="centerHorizontal btn btn-primary" value="Tambahkan"></a>
                  </div>
                  <?php
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include (ROOT_PATH.'views/bodyview/footer.php'); ?>

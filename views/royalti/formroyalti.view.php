<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title"><?= $data['action'] == "tambah" ? "Tambah Penjualan Buku" : "Edit Penjualan Buku"; ?> </h2>
          <p class="pageheader-text">Royalti</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=royalti" class="breadcrumb-link">Penjualan Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['action'] == "tambah" ? "Tambah Penjualan Buku" : $data['royalti']->nama_buku; ?> </li>
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
              <form action="index.php?hal=royalti&action=simpan" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Tanggal Penjualan</label>
                  <input required name="tanggal_penjualan" id="inputText3" type="date" class="form-control" value="<?= $data['action'] == "edit" ? $data['royalti']->tanggal_penjualan : "" ?>">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Buku</label>
                  <select name="id_buku" class="form-control">
                                      <?php
                                      foreach ($data["buku"] as $k => $buku) {
                                        ?>
                                            <option value="<?= $buku->id_buku ?>"
                                              <?php
                                              if($data['action'] == "edit" && $data['royalti']->id_buku == $buku->id_buku)
                                                echo "selected"; ?> >
                                              <?= $buku->nama_buku ?></option>
                                        <?php
                                        }
                                        ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Jumlah Penjualan</label>
                  <input required name="jumlah_penjualan" type="number" step="any" class="form-control" value="<?= $data['action'] == "edit" ? $data['royalti']->jumlah_penjualan : "" ?>">
                </div>
                <?php
                if($data['action'] == "edit"){
                  ?>
                    <input type="hidden" name="id" value="<?= $data["royalti"]->id_penjualan_buku ?>">
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

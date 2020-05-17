<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title"><?= $data['action'] == "tambah" ? "Tambah Penulis" : "Edit Penulis"; ?> </h2>
          <p class="pageheader-text">Manajemen Penulis</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=penulis" class="breadcrumb-link">Manajemen Penulis</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['action'] == "tambah" ? "Tambah Penulis" : $data['penulis']->nama_penulis; ?> </li>
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
              <form action="index.php?hal=penulis&action=simpan" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Nama Penulis</label>
                  <input required name="nama_penulis" id="inputText3" type="text" class="form-control" value="<?= $data['action'] == "edit" ? $data['penulis']->nama_penulis : "" ?>">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Email Penulis</label>
                  <input <?php if($data['action'] == "edit") echo "disabled";?> required name="email_penulis" id="inputText3" type="text" class="form-control" value="<?= $data['action'] == "edit" ? $data['penulis']->email_penulis : "" ?>">
                </div>

                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Jenis Kelamin</label>
                  <select name="jk_penulis" class="form-control">
                    <option value="L" <?php if($data['action'] == "edit" && $data['penulis']->jk_penulis == "L") echo "selected"; ?>>Laki - Laki</option>
                    <option value="P" <?php if($data['action'] == "edit" && $data['penulis']->jk_penulis == "P") echo "selected"; ?>>Perempuan</option>
                  </select>
                </div>
                <?php
                if($data['action'] == "edit"){
                  ?>
                    <input type="hidden" name="id" value="<?= $data["penulis"]->id_penulis ?>">
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

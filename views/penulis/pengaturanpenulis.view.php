Penulis<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Pengaturan</h2>
          <p class="pageheader-text">Pengaturan Penulis</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=penulis" class="breadcrumb-link">Pengaturan Penulis</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page"><?= $data['action'] == "tambah" ? "Tambah Penulis" : $data['penulis']->nama_penulis; ?> </li> -->
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
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
          <div class="card">
            <h5 class="card-header">Pengaturan Bio</h5>
            <div class="card-body">
              <form action="index.php?hal=pengaturan&action=simpanBioPenulis" method="post" enctype="multipart/form-data">
                <input name="id_penulis" id="inputText3" type="hidden" class="form-control" value="<?= $data['account']->id_penulis ?>">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Username Penulis</label>
                  <input required name="username" id="inputText3" type="text" class="form-control" value="<?= $data['account']->username_penulis ?>">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Email Penulis</label>
                  <input disabled required name="email_penulis" id="inputText3" type="text" class="form-control" value="<?= $data['account']->email_penulis ?>">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Nama Penulis</label>
                  <input required name="nama_penulis" id="inputText3" type="text" class="form-control" value="<?= $data['account']->nama_penulis ?>">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Jenis Kelamin</label>
                  <select name="jk" class="form-control">
                    <option
                    <?php
                      if($data['account']->jk_penulis == "L") echo "selected";
                    ?> value="L">Laki - Laki</option>
                    <option
                    <?php
                      if($data['account']->jk_penulis == "P")
                      echo "selected";
                    ?> value="P">Perempuan</option>
                  </select>
                </div>
                <div class="custom-file mb-3 marg20-top">
                  <input type="submit" href="#" class="centerHorizontal btn btn-primary" value="Update Profil"/>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
          <div class="card">
            <h5 class="card-header">Pengaturan Password</h5>
            <div class="card-body">
              <form action="index.php?hal=pengaturan&action=simpanpassword" method="post" enctype="multipart/form-data">
                <input name="id" id="inputText3" type="hidden" class="form-control" value="<?= $data['account']->id_penulis ?>"/>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Password Saat ini</label>
                  <input required name="password_saatini" id="inputText3" type="password" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Password Baru</label>
                  <input required name="password_baru" id="inputText3" type="password" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Ulangi Password Baru</label>
                  <input required name="ulangi_password_baru" id="inputText3" type="password" class="form-control" value="">
                </div>
                <div class="custom-file mb-3 marg20-top">
                  <input type="submit" href="#" class="centerHorizontal btn btn-primary" value="Ubah Password"/>
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

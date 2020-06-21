<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Daftar Admin </h2>
          <p class="pageheader-text">Manajemen Admin</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <?php
                    switch ($data["page"]) {
                      case 'admin':
                        ?>
                        <a href="index.php?hal=admin" class="breadcrumb-link">Manajemen Admin</a>
                        <?php
                        break;
                      case 'buku':
                        ?>
                        <a href="index.php?hal=buku" class="breadcrumb-link">Manajemen Buku</a>
                        <?php
                        break;

                      default:

                        break;
                    }
                  ?>

                </li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Admin</li>
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
            <h5 class="card-header">Admin yang sudah ditambahkan</h5>
            <div class="card-body p-0">
              <div class="table-responsive">
                <?php
                if(count($data["admin"]) == 0){
                  ?>
                  <center class="marg50-top marg50-bottom">Data belum tersedia </center>
                  <?php
                } else {
                  ?>
                <table class="table">
                  <thead class="bg-light">
                    <tr class="border-0">
                      <th style="text-align:center" class="border-0 centerHorizontal" style="width:20px">No</th>
                      <th style="text-align:center" class="border-0">Nama Admin</th>
                      <th style="text-align:center" class="border-0">Username</th>
                      <th class="border-0 text-center" width="100">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($data["admin"] as $k => $admin) { ?>
                      <tr>
                        <td class="centerHorizontal text-center">
                          <?= ++$no;?>
                        </td>
                        <td style="text-align : center">
                          <?= $admin->nama_admin ?>
                        </td>
                        <td style="text-align : center">
                          <?= $admin->username_admin ?>
                        </td>
                        <td class="text-center">
                          <a href="#" onclick="directDelete('index.php?hal=admin&action=delete&id=<?= $admin->id_admin ?>')">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                      <?php }?>
                  </tbody>
                </table><?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include (ROOT_PATH.'views/bodyview/footer.php'); ?>

<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Daftar Penulis </h2>
          <p class="pageheader-text">Manajemen Penulis</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <?php
                    switch ($data["page"]) {
                      case 'penulis':
                        ?>
                        <a href="index.php?hal=penulis" class="breadcrumb-link">Manajemen Penulis</a>
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
                <li class="breadcrumb-item active" aria-current="page">Daftar Penulis</li>
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
            <h5 class="card-header">Penulis yang sudah ditambahkan</h5>
            <div class="card-body p-0">
              <div class="table-responsive">
                <?php
                if(count($data["penulis"]) == 0){
                  ?>
                  <center class="marg50-top marg50-bottom">Data belum tersedia </center>
                  <?php
                } else {
                  ?>
                <table class="table">
                  <thead class="bg-light">
                    <tr class="border-0">
                      <th style="text-align:center" class="border-0 centerHorizontal" style="width:20px">No</th>
                      <th style="text-align:center" class="border-0">Nama Penulis</th>
                      <th style="text-align:center" class="border-0">Email Penulis</th>
                      <th style="text-align:center" class="border-0">Username</th>
                      <th style="text-align:center" class="border-0">Jenis Kelamin</th>
                      <th style="text-align:center" class="border-0">Status</th>
                      <th class="border-0 text-center" width="100">
                        <?php
                          switch ($data["page"]) {
                            case 'penulis':
                              echo "Aksi";
                              break;
                            default:
                              echo "Detail";
                              break;
                          }
                        ?>

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($data["penulis"] as $k => $penulis) { ?>
                      <tr>
                        <td class="centerHorizontal text-center">
                          <?= ++$no;?>
                        </td>
                        <td style="text-align : center">
                          <?= $penulis->nama_penulis ?>
                        </td>
                        <td style="text-align : center">
                          <?= $penulis->email_penulis ?>
                        </td>
                        <td style="text-align : center">
                          <?= $penulis->username_penulis != "" ? $penulis->username_penulis : "-"  ?>
                        </td>
                        <td style="text-align : center">
                          <?= $penulis->jk_penulis == "L" ? "Laki - Laki" : "Perempuan" ?>
                        </td>
                        <td style="text-align : center">
                          <?= $penulis->active == 1 ? "Aktif" : "Belum Aktif" ?>
                        </td>
                        <td class="text-center">
                          <?php
                            switch ($data["page"]) {
                              case 'penulis':
                                ?>
                                <a class="btn btn-success" href='index.php?hal=penulis&action=edit&id=<?= $penulis->id_penulis ?>'>
                                  <i class="fas fa-edit"></i>
                                </a> &nbsp;&nbsp;
                                <a href="#" onclick="directDelete('index.php?hal=penulis&action=delete&id=<?= $penulis->id_penulis ?>')">
                                  <i class="fas fa-trash"></i>
                                </a>
                                <?php
                                break;
                              case 'buku':
                                ?>
                                <a class="" href='index.php?hal=bukupenulis&action=penulis&id=<?= $penulis->id_penulis ?>'>
                                  <i class="fas fa-search"></i>
                                </a>
                                <?php
                                break;

                              default:

                                break;
                            }
                          ?>
                        </td>
                      </tr>
                      <?php }?>
                  </tbody>
                </table><?php } ?>
              </div>
              <!-- <div class="col-md-12">
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <?php
                    if($data['jumlah']>1){
                      for($i=1;$i<=$data['jumlah'];$i++){
                        if(isset($data['page'])){
                          if($data['page']==$i){
                            echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
                          }else{
                            echo "<li class='page-item'><a class='page-link' href='?r=".$i."'>".$i."</a></li>";
                          }
                        }else{
                          if($i==1){
                            echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>';
                          }else{
                            echo "<li class='page-item'><a class='page-link' href='?r=".$i."'>".$i."</a></li>";
                          }
                        }
                      }
                    }
                    ?>
                  </ul>
                </nav>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include (ROOT_PATH.'views/bodyview/footer.php'); ?>

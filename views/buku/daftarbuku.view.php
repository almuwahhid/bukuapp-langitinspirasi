<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Daftar Buku </h2>
          <p class="pageheader-text">Manajemen Buku</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=buku" class="breadcrumb-link">Manajemen Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php
                    if($data["page"] == "bukupenulis"){
                  ?>
                    <a href="index.php?hal=bukupenulis">Buku Penulis</a>
                  <?php
                } else{
                  ?>
                    Daftar Buku
                </li>
                <?php
                }
                if($data["page"] == "bukupenulis"){
                ?>
                  <li class="breadcrumb-item"><a href="index.php?hal=bukupenulis&action=penulis&id=<?= $data["penulis"]->id_penulis ?>" class="breadcrumb-link"><?= $data["penulis"]->nama_penulis ?></a></li>
                <?php
                }
                ?>
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
            <h5 class="card-header">Buku yang sudah ditambahkan</h5>
            <?php
              if($data["page"] == "bukupenulis"){
                if($_SESSION['level'] == "admin"){
                ?>
                <div class="col-md-12" style="position:absolute;margin-top:8px;text-align:right">
                  <a class="btn btn-success" href='index.php?hal=bukupenulis&action=tambah&id=<?= $data["penulis"]->id_penulis ?>'>
                    <i class="fas fa-plus"></i>
                  </a>
                </div>
                <?php
                }
              } else {
                if($_SESSION['level'] == "admin"){
                ?>
                <div class="col-md-12" style="position:absolute;margin-top:8px;text-align:right">
                  <a class="btn btn-success" href='index.php?hal=buku&action=tambah'>
                    <i class="fas fa-plus"></i>
                  </a>
                </div>
                <?php
                }
              }
            ?>

            <div class="card-body p-0">
              <div class="table-responsive">
                <?php
                if(count($data["buku"]) == 0){
                  ?>
                  <center class="marg50-top marg50-bottom">Data belum tersedia </center>
                  <?php
                } else {
                  ?>
                <table class="table">
                  <thead class="bg-light">
                    <tr class="border-0">
                      <th class="border-0 centerHorizontal" style="width:20px">No</th>
                      <th class="border-0 text-center">Judul Buku</th>
                      <th class="border-0 text-center">Harga</th>
                      <?php
                      if($_SESSION['level'] == "admin"){
                      ?>
                      <th class="border-0 text-center">Penulis</th>
                    <?php } ?>
                      <th class="border-0 text-center">Tahun Terbit</th>
                      <?php
                      if($_SESSION['level'] == "admin"){
                      ?>
                      <th class="border-0 text-center" width="100">
                        Aksi
                      </th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($data["buku"] as $k => $buku) { ?>
                      <tr>
                        <td class="centerHorizontal text-center">
                          <?= ++$no;?>
                        </td>
                        <td class="text-center">
                          <?= $buku->nama_buku ?>
                        </td>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah($buku->harga) ?>
                        </td>
                        <?php
                        if($_SESSION['level'] == "admin"){
                        ?>
                        <td class="text-center">
                          <?= $buku->nama_penulis ?>
                        </td>
                        <?php } ?>
                        <td class="text-center">
                          <?= $buku->tahun_terbit ?>
                        </td>
                        <?php
                        if($_SESSION['level'] == "admin"){
                        ?>
                        <td class="text-center">
                          <?php
                            switch ($data["page"]) {
                              case 'buku':
                                ?>
                                <a class="btn btn-success" href='index.php?hal=buku&action=edit&id=<?= $buku->id_buku ?>'>
                                  <i class="fas fa-edit"></i>
                                </a> &nbsp;&nbsp;
                                <a href="#" onclick="directDelete('index.php?hal=buku&action=delete&id=<?= $buku->id_buku ?>')">
                                  <i class="fas fa-trash"></i>
                                </a>
                                <?php
                                break;
                              case 'bukupenulis':
                                ?>
                                <a class="" href="#" onclick="directDelete('index.php?hal=bukupenulis&action=hapus&id=<?= $buku->id_penulis ?>&id_buku=<?= $buku->id_bukupenulis ?>')">
                                  <i class="fas fa-trash"></i>
                                </a>
                                <?php
                                break;

                              default:

                                break;
                            }
                          ?>
                        </td>
                        <?php } ?>
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

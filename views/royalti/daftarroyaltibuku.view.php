<?php include (ROOT_PATH.'views/bodyview/header.php'); ?>
<div class="dashboard-ecommerce" style="min-height : 88vh">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Daftar Penjualan Buku</h2>
          <p class="pageheader-text">Royalti</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=royalti" class="breadcrumb-link">Penjualan Buku</a></li>
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
            <div class="col-md-12 marg10-top">
              <form class="" action="index.php?hal=royalti" method="get">
                <input type="hidden" name="hal" value="royalti">
                <div class="row">
                  <div class="col-md-3">
                    <b>Filter Buku :</b> <br>
                    <div class="form-group">
                      <select name="id_buku" class="form-control">
                        <option value="">Semua Buku</option>
                                          <?php
                                          foreach ($data["buku"] as $k => $buku) {
                                            ?>
                                                <option value="<?= $buku->id_buku ?>"
                                                  <?php
                                                    if(isset($_GET["id_buku"]) && $_GET["id_buku"] == $buku->id_buku)
                                                    echo "selected";
                                                  ?>>
                                                  <?= $buku->nama_buku ?></option>
                                            <?php
                                            }
                                            ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <b>Filter Tahun :</b> <br>
                    <div class="form-group">
                      <select name="tahun" class="form-control">
                        <option value="">Tahun Sekarang</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2000)
                          echo "selected";
                        ?> value="2000">Th. 2000</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2001)
                          echo "selected";
                        ?> value="2001">Th. 2001</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2002)
                          echo "selected";
                        ?> value="2002">Th. 2002</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2003)
                          echo "selected";
                        ?> value="2003">Th. 2003</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2004)
                          echo "selected";
                        ?> value="2004">Th. 2004</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2005)
                          echo "selected";
                        ?> value="2005">Th. 2005</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2006)
                          echo "selected";
                        ?> value="2006">Th. 2006</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2007)
                          echo "selected";
                        ?> value="2007">Th. 2007</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2008)
                          echo "selected";
                        ?> value="2008">Th. 2008</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2009)
                          echo "selected";
                        ?> value="2009">Th. 2009</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2010)
                          echo "selected";
                        ?> value="2010">Th. 2010</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2011)
                          echo "selected";
                        ?> value="2011">Th. 2011</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2012)
                          echo "selected";
                        ?> value="2012">Th. 2012</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2013)
                          echo "selected";
                        ?> value="2013">Th. 2013</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2014)
                          echo "selected";
                        ?> value="2014">Th. 2014</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2015)
                          echo "selected";
                        ?> value="2015">Th. 2015</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2016)
                          echo "selected";
                        ?> value="2016">Th. 2016</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2017)
                          echo "selected";
                        ?> value="2017">Th. 2017</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2018)
                          echo "selected";
                        ?> value="2018">Th. 2018</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2019)
                          echo "selected";
                        ?> value="2019">Th. 2019</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2020)
                          echo "selected";
                        ?> value="2020">Th. 2020</option>
                        <option
                        <?php
                          if(isset($_GET["tahun"]) && $_GET["tahun"] == 2021)
                          echo "selected";
                        ?> value="2021">Th. 2021</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <b>Filter Bulan :</b> <br>
                    <div class="form-group">
                      <select name="bulan" class="form-control">
                        <option value="">Seluruh Bulan</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 1)
                          echo "selected";
                        ?> value="1">Januari</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 2)
                          echo "selected";
                        ?> value="2">Februari</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 3)
                          echo "selected";
                        ?> value="3">Maret</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 4)
                          echo "selected";
                        ?> value="4">April</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 5)
                          echo "selected";
                        ?> value="5">Mei</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 6)
                          echo "selected";
                        ?> value="6">Juni</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 7)
                          echo "selected";
                        ?> value="7">Juli</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 8)
                          echo "selected";
                        ?> value="8">Agustus</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 9)
                          echo "selected";
                        ?> value="9">September</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 10)
                          echo "selected";
                        ?> value="10">Oktober</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 11)
                          echo "selected";
                        ?> value="11">November</option>
                        <option
                        <?php
                          if(isset($_GET["bulan"]) && $_GET["bulan"] == 12)
                          echo "selected";
                        ?> value="12">Desember</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <br>
                    <button type="submit" style="width:80px" class="btn btn-primary btn-lg btn-block">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <hr>
            <h5 class="card-header"><?= $data["title"] ?></h5>
            <?php
            if($_SESSION['level'] == "admin"){
            ?>
            <div class="col-md-12" style="position:absolute;margin-top: 80px;text-align:right">
              <a class="btn btn-success" href='index.php?hal=royalti&action=tambah'>
                <i class="fas fa-plus"></i>
              </a>
            </div>
            <?php } ?>
            <div class="card-body p-0">
              <div class="table-responsive">
                <?php
                if(count($data["royalti"]) == 0){
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
                      <th class="border-0 text-center">Tgl Penjualan</th>
                      <?php
                      if($_SESSION['level'] == "admin"){
                      ?>
                      <th class="border-0 text-center">Penulis</th>
                      <?php } ?>
                      <th class="border-0 text-center">Harga</th>
                      <th class="border-0 text-center">Jumlah Penjualan</th>
                      <th class="border-0 text-center">SubTotal</th>
                      <?php
                      if($_SESSION['level'] == "admin"){
                      ?>
                      <th class="border-0 text-center">Keuntungan</th>
                      <?php } ?>
                      <th class="border-0 text-center">Royalti</th>
                      <?php
                      if($_SESSION['level'] == "admin"){
                      ?>
                      <th class="border-0 text-center" width="100">
                        Aksi
                      </th>
                      <?php
                      }?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($data["royalti"] as $k => $royalti) { ?>
                      <tr>
                        <td class="centerHorizontal text-center">
                          <?= ++$no;?>
                        </td>
                        <td class="text-center">
                          <?= $royalti->nama_buku ?>
                        </td>
                        <td class="text-center">
                          <?= tgl_indo($royalti->tanggal_penjualan) ?>
                        </td>
                        <?php
                        if($_SESSION['level'] == "admin"){
                        ?>
                        <td class="text-center">
                          <?= $royalti->nama_penulis ?>
                        </td>
                        <?php } ?>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah($royalti->harga) ?>
                        </td>
                        <td class="text-center">
                          <?= $royalti->jumlah_penjualan ?>
                        </td>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah(($royalti->jumlah_penjualan*$royalti->harga)) ?>
                        </td>
                        <?php
                        if($_SESSION['level'] == "admin"){
                        ?>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah(($royalti->jumlah_penjualan*$royalti->harga) - (($royalti->jumlah_penjualan*$royalti->harga)*10/100)) ?>
                        </td>
                        <?php } ?>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah((($royalti->jumlah_penjualan*$royalti->harga)*10/100) - ((($royalti->jumlah_penjualan*$royalti->harga)*10/100)*15/100)) ?>
                        </td>
                        <?php
                        if($_SESSION['level'] == "admin"){
                        ?>
                        <td class="text-center">
                          <!-- <a href='index.php?hal=royalti&action=detail&id=<?= $royalti->id_penjualan_buku ?>'>
                            <i class="fas fa-search"></i>
                          </a> &nbsp;&nbsp; -->
                          <a class="btn btn-success" href='index.php?hal=royalti&action=edit&id=<?= $royalti->id_penjualan_buku ?>'>
                            <i class="fas fa-edit"></i>
                          </a> &nbsp;&nbsp;
                          <a href="#" onclick="directDelete('index.php?hal=royalti&action=delete&id=<?= $royalti->id_penjualan_buku ?>')">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                        <?php
                        }?>
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
          <div style="font-size:20px" class="col-md-12">
            Cetak Royalti : &nbsp;&nbsp;
            <a target="_blank" href="<?= $data['laporan'] ?>">
              <i class="fas fa-print"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include (ROOT_PATH.'views/bodyview/footer.php'); ?>

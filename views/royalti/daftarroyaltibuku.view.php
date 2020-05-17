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
              <div class="row">
                <div class="col-md-3">
                  <b>Filter Buku :</b> <br>
                  <div class="form-group">
                    <select name="id_buku" class="form-control">
                      <option value="0">All</option>
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
                </div>
                <div class="col-md-3">
                  <b>Filter Tahun :</b> <br>
                  <div class="form-group">
                    <select name="tahun" class="form-control">
                      <option value="0">All</option>
                      <option value="2000">Th. 2000</option>
                      <option value="2001">Th. 2001</option>
                      <option value="2002">Th. 2002</option>
                      <option value="2003">Th. 2003</option>
                      <option value="2004">Th. 2004</option>
                      <option value="2005">Th. 2005</option>
                      <option value="2006">Th. 2006</option>
                      <option value="2007">Th. 2007</option>
                      <option value="2008">Th. 2008</option>
                      <option value="2009">Th. 2009</option>
                      <option value="2010">Th. 2010</option>
                      <option value="2011">Th. 2011</option>
                      <option value="2012">Th. 2012</option>
                      <option value="2013">Th. 2013</option>
                      <option value="2014">Th. 2014</option>
                      <option value="2015">Th. 2015</option>
                      <option value="2016">Th. 2016</option>
                      <option value="2017">Th. 2017</option>
                      <option value="2018">Th. 2018</option>
                      <option value="2019">Th. 2019</option>
                      <option value="2020">Th. 2020</option>
                      <option value="2021">Th. 2021</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <b>Filter Bulan :</b> <br>
                  <div class="form-group">
                    <select name="bulan" class="form-control">
                      <option value="0">All</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <br>
                  <a class="btn btn-warning" href='index.php?hal=royalti&action=tambah'>
                    <i class="fas fa-search"></i>
                  </a>
                </div>
              </div>
            </div>
            <hr>
            <h5 class="card-header">Penjualan Buku yang sudah ditambahkan</h5>
            <div class="col-md-12" style="position:absolute;margin-top: 80px;text-align:right">
              <a class="btn btn-success" href='index.php?hal=royalti&action=tambah'>
                <i class="fas fa-plus"></i>
              </a>
            </div>
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
                      <th class="border-0 text-center">Penulis</th>
                      <th class="border-0 text-center">Harga</th>
                      <th class="border-0 text-center">Jumlah Penjualan</th>
                      <th class="border-0 text-center">SubTotal</th>
                      <th class="border-0 text-center">Keuntungan</th>
                      <th class="border-0 text-center" width="100">
                        Aksi
                      </th>
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
                        <td class="text-center">
                          <?= $royalti->nama_penulis ?>
                        </td>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah($royalti->harga) ?>
                        </td>
                        <td class="text-center">
                          <?= $royalti->jumlah_penjualan ?>
                        </td>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah(($royalti->jumlah_penjualan*$royalti->harga)) ?>
                        </td>
                        <td class="text-center">
                          <?= "Rp. ".format_rupiah(($royalti->jumlah_penjualan*$royalti->harga) - (($royalti->jumlah_penjualan*$royalti->harga)*10/100)) ?>
                        </td>
                        <td class="text-center">
                          <a href='index.php?hal=royalti&action=detail&id=<?= $royalti->id_penjualan_buku ?>'>
                            <i class="fas fa-search"></i>
                          </a> &nbsp;&nbsp;
                          <a class="btn btn-success" href='index.php?hal=royalti&action=edit&id=<?= $royalti->id_penjualan_buku ?>'>
                            <i class="fas fa-edit"></i>
                          </a> &nbsp;&nbsp;
                          <a href="#" onclick="directDelete('index.php?hal=royalti&action=delete&id=<?= $royalti->id_penjualan_buku ?>')">
                            <i class="fas fa-trash"></i>
                          </a>
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
          <div style="font-size:20px" class="col-md-12">
            Cetak Royalti : &nbsp;&nbsp;
            <a href="#">
              <i class="fas fa-print"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include (ROOT_PATH.'views/bodyview/footer.php'); ?>

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
          <p class="pageheader-text">Detail Royalti</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?hal=royalti" class="breadcrumb-link">Penjualan Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= tgl_indo($data["royalti"]->tanggal_penjualan) ?></li>
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
            <h5 class="card-header">Penjualan buku <?= tgl_indo($data["royalti"]->tanggal_penjualan) ?></h5>

            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr class="border-0">
                      <th class="border-0">Judul Buku</th>
                      <td class="border-0 text-center"><?= $data["royalti"]->nama_buku ?></td>
                    </tr>
                    <tr class="border-0">
                      <th class="border-0">Tanggal Penjualan</th>
                      <td class="border-0 text-center"><?= tgl_indo($data["royalti"]->tanggal_penjualan) ?></td>
                    </tr>
                    <tr class="border-0">
                      <th class="border-0">Penulis</th>
                      <td class="border-0 text-center"><?= $data["royalti"]->nama_penulis ?></td>
                    </tr>
                    <tr class="border-0">
                      <th class="border-0">Harga Buku</th>
                      <td class="border-0 text-center"><?= $data["royalti"]->nama_buku ?></td>
                    </tr>
                    <tr class="border-0">
                      <th class="border-0">Jumlah Penjualan</th>
                      <td class="border-0 text-center"><?= $data["royalti"]->jumlah_penjualan ?></td>
                    </tr>
                    <tr class="border-0">
                      <th class="border-0">Keuntungan</th>
                      <td class="border-0 text-center">
                        <?= "Rp. ".format_rupiah(($royalti->jumlah_penjualan*$royalti->harga) - (($royalti->jumlah_penjualan*$royalti->harga)*10/100)) ?>
                      </td>
                    </tr>
                    <tr class="border-0">
                      <th class="border-0">Royalti</th>
                      <td class="border-0 text-center">
                        <?= "Rp. ".format_rupiah((($royalti->jumlah_penjualan*$royalti->harga)*10/100) - ((($royalti->jumlah_penjualan*$royalti->harga)*10/100)*15/100)) ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
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

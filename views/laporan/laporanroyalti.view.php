<?php
  require ROOT_PATH.'vendor/autoload.php';
  use Spipu\Html2Pdf\Html2Pdf;
  setlocale(LC_ALL, "IND");

  $title = "";
  $thpenulis = "";
  $thpenulis2 = "";
  if($_SESSION['level'] == 'penulis'){
    $title = "Laporan Royalti Penjualan Buku";
  } else {
    $title = "Laporan Pendapatan Penjualan Buku";
    $thpenulis = '<th align="center" style="width:150px">Penulis</th>';
    $thpenulis2 = '<th align="center">Keuntungan</th>';
  }

  $html = '<!DOCTYPE html>
  <html>
  <head>
    <title>'.$data['title'].'</title>
    <style type="text/css">
    #outtable{
      padding: 20px;

      }
      .short{

      }
      table{
        border: 1px solid black;
        font-family: arial;
        color:#5E5B5C;
      }
      thead th{
        text-align: center;
        border-right: 1px solid #e3e3e3;
        padding: 10px;
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
      }
      tbody td{
        text-align:center;
        border-top: 1px solid #e3e3e3;
        border-right: 1px solid #e3e3e3;
        padding: 10px;
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
      }
      tbody tr:nth-child(even){
        background: #F6F5FA;
      }
      tr{
        font-size: 12px;
      }
      tbody tr:hover{
        background: #EAE9F5
      }
      .text-center{
        text-align: : center
      }
    </style>
  </head>
  <body>
  <div id="outtable">
  <h3>'.$title.'</h3>
  <hr>
  <br>
  '.$data['title'].'<br><br>
    <table>
      <thead>
        <tr>
          <th align="center" style="width:20px">No</th>
          <th align="center" style="width:150px">Judul Buku</th>
          <th align="center">Tgl Penjualan</th>
          '.$thpenulis.'
          <th align="center">Harga</th>
          <th align="center" style="width:60px">Jumlah Penjualan</th>
          <th align="center">Subtotal</th>
          '.$thpenulis2.'
          <th align="center">Royalti</th>
        </tr>
      </thead>
      <tbody>';
      $no = 0;
      foreach ($data["royalti"] as $k => $royalti) {
        $no++;
        $tdpenulis = "";
        $tdpenulis2 = "";

        if($_SESSION['level'] != 'penulis'){
          $tdpenulis = '<td align="center">'.$royalti->nama_penulis.'</td>';
          $tdpenulis2 = '<td align="center">Rp. '.format_rupiah(($royalti->jumlah_penjualan*$royalti->harga) - (($royalti->jumlah_penjualan*$royalti->harga)*10/100)).'</td>';
        }

        $html = $html.'<tr>';
          $html = $html.'
          <td align="center">
            '.$no.'
          </td>
          <td align="center">
            '.$royalti->nama_buku.'
          </td>
          <td align="center">
            '.tgl_indo($royalti->tanggal_penjualan).'
          </td>
          '.$tdpenulis.'
          <td align="center">
            Rp. '.format_rupiah($royalti->harga).'
          </td>
          <td align="center">
            '.$royalti->jumlah_penjualan.'
          </td>
          <td align="center">
            Rp. '.format_rupiah(($royalti->jumlah_penjualan*$royalti->harga)).'
          </td>
          '.$tdpenulis2.'
          <td align="center">
            Rp. '.format_rupiah((($royalti->jumlah_penjualan*$royalti->harga)*10/100) - ((($royalti->jumlah_penjualan*$royalti->harga)*10/100)*15/100)).'
          </td>';
          $html = $html.'</tr>';
      }
      $html = $html.'</tbody>
    </table>
   </div>
  </body>
  </html>';

  ob_end_clean();
  if($_SESSION['level'] == 'penulis'){
    $html2pdf = new Html2Pdf('P', 'A4', 'en');
  } else {
    $html2pdf = new Html2Pdf('L', 'A4', 'en');
  }
  $html2pdf->writeHTML($html);
  $html2pdf->output();
?>

<?php
	/**
     * @Author  : Langit Inspirasi <web@langitinspirasi.co.id>
     * @Date    : 26/05/17 - 3:06 AM
	 * @Phone   : 0856-2555-665
	 *
	 * @Warning : Please don't delete this notes !
    */
	// use \Controller;
	include "BaseAdminController.php";
	include "library/rupiah.class.php";
	include "library/date.class.php";
	include "library/util.class.php";
	class LaporanController extends BaseAdminController{
		public function index(){
			$this->model("royalti");
			$this->model("buku");

			$tahun  = isset($_GET["tahun"]) ? $_GET["tahun"] : "";
			$bulan  = isset($_GET["bulan"]) ? $_GET["bulan"] : "";
			$id_buku  = isset($_GET["id_buku"]) ? $_GET["id_buku"] : "";
			$title = "Penjualan ";

			$where = array();
			if($_SESSION['level'] == "penulis"){
				$id_penulis = json_decode($_SESSION['data'])->id_penulis;
				$where['buku.id_penulis'] = $id_penulis;
			}

			if($id_buku != ""){
				$where['penjualan_buku.id_buku'] = $id_buku;
				$title .= 'Buku "'.$this->buku->getWhere(array('id_buku'   => $id_buku))[0]->nama_buku.'"';
			}

			if($bulan != ""){
				$where['month(tanggal_penjualan)'] = $bulan;
				$title .= " Bulan ".getBulan($bulan);
			}

			if($tahun == ""){
				$where['year(tanggal_penjualan)'] = date("Y");
				$title .= " Tahun ".date("Y");
			} else {
				$where['year(tanggal_penjualan)'] = $tahun;
				$title .= " Tahun ".$tahun;
			}

			$result = array();
			$result['page'] = "royalti";
			$result['account'] = json_decode($_SESSION['data']);
			$result['royalti'] = $this->royalti->getRoyalti($where);
			$result['buku'] = $this->buku->get();
			$result['title'] = $title;

			$this->template('laporan/laporanroyalti', $result);
		}
	}
?>

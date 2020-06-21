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
	class RoyaltiController extends BaseAdminController{
		public function index(){
			$this->model("royalti");
			$this->model("buku");

			$tahun  = isset($_GET["tahun"]) ? $_GET["tahun"] : "";
			$bulan  = isset($_GET["bulan"]) ? $_GET["bulan"] : "";
			$id_buku  = isset($_GET["id_buku"]) ? $_GET["id_buku"] : "";
			$title = "Penjualan ";

			$urllaporan = "index.php?hal=laporan";
      $urllaporan = isset($_GET["tahun"]) ? $urllaporan."&tahun=".$_GET["tahun"] : $urllaporan;
      $urllaporan = isset($_GET["bulan"]) ? $urllaporan."&bulan=".$_GET["bulan"] : $urllaporan;
      $urllaporan = isset($_GET["id_buku"]) ? $urllaporan."&id_buku=".$_GET["id_buku"] : $urllaporan;

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
			$result['laporan'] = $urllaporan;

			$this->template('royalti/daftarroyaltibuku', $result);
		}

		public function tambah(){
			$this->model("buku");

			$result = array();
			$result['page'] = "royalti";
			$result['action'] = "tambah";
			$result['account'] = json_decode($_SESSION['data']);
			$result['buku'] = $this->buku->get();

			$this->template('royalti/formroyalti', $result);
		}

    public function edit(){
			$this->model("buku");
			$this->model("royalti");

      $id = $_GET['id'];

			$result = array();
			$result['page'] = "royalti";
			$result['action'] = "edit";
			$result['account'] = json_decode($_SESSION['data']);
			$result['buku'] = $this->buku->get();
			$result['royalti'] = $this->royalti->getRoyaltiDetil($id)[0];

			$this->template('royalti/formroyalti', $result);
		}

    public function delete(){
			$this->model("royalti");

      $id = $_GET['id'];

      $update = $this->royalti->delete(array('id_penjualan_buku'   => $id));
      if($update){
        $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menghapus penjualan buku";
        header("Location: index.php?hal=royalti&success=true");
      } else {
        $_SESSION['SUCCESS_MESSAGE'] = "Gagal menghapus penjualan buku";
        header("Location: index.php?hal=royalti&success=false");
      }
		}

    public function simpan(){
			$this->model("royalti");

      if($_SERVER["REQUEST_METHOD"] == "POST") {
					$id_buku  = isset($_POST["id_buku"]) ? $_POST["id_buku"] : "";
					$jumlah_penjualan  = isset($_POST["jumlah_penjualan"]) ? $_POST["jumlah_penjualan"] : "";
					$tanggal_penjualan     = isset($_POST["tanggal_penjualan"]) ? $_POST["tanggal_penjualan"] : "";
					$id     = isset($_POST["id"]) ? $_POST["id"] : "";
					$action     = isset($_POST["action"]) ? $_POST["action"] : "";

          $param = array(
							'id_buku'   => $id_buku,
							'jumlah_penjualan'      => $jumlah_penjualan,
							'tanggal_penjualan'     => $tanggal_penjualan
            );

          if($action == "edit"){
            $update = $this->royalti->update($param, array('id_penjualan_buku'   => $id));
            if($update){
              $_SESSION['SUCCESS_MESSAGE'] = "Berhasil mengedit Buku";
              header("Location: index.php?hal=royalti&action=edit&id=".$id."&success=true");
            } else {
              $_SESSION['SUCCESS_MESSAGE'] = "Gagal mengedit Buku";
              header("Location: index.php?hal=royalti&action=edit&id=".$id."&success=false");
            }
          } else {
            $insert = $this->royalti->insert($param);
            if($insert){
              $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menambah buku";
              header("Location: index.php?hal=royalti&success=true");
            } else {
              $_SESSION['SUCCESS_MESSAGE'] = "Gagal menambah buku";
              header("Location: index.php?hal=royalti&success=false");
            }
          }
      } else {
        echo "fuck you";
      }
		}
	}
?>

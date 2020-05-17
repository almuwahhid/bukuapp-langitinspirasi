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
	include "library/util.class.php";
  include "library/rupiah.class.php";
	class BukuPenulisController extends BaseAdminController{
		public function index(){
			$this->model("penulis");

			$result = array();
			$result['page'] = "buku";
			$result['account'] = json_decode($_SESSION['data']);
			$result['penulis'] = $this->penulis->get();

			$this->template('penulis/daftarpenulis', $result);
		}

    public function tambah(){
      $this->model("buku");
			$this->model("penulis");
      $id = $_GET['id'];

			$result = array();
			$result['page'] = "buku";
			$result['action'] = "tambah";
			$result['account'] = json_decode($_SESSION['data']);
			$result['penulis'] = $this->penulis->getWhere(array('id_penulis'   => $id))[0];
			$result['buku'] = $this->buku->get();

			$this->template('buku/formbukupenulis', $result);
		}

		public function penulis(){
			$this->model("bukupenulis");
			$this->model("penulis");
      $id = $_GET['id'];

			$result = array();
			$result['page'] = "bukupenulis";
			$result['account'] = json_decode($_SESSION['data']);
			$result['penulis'] = $this->penulis->getWhere(array('id_penulis'   => $id))[0];
      $result['buku'] = $this->bukupenulis->getBukuPenulis($id);

			$this->template('buku/daftarbuku', $result);
		}

    public function hapus(){
			$this->model("bukupenulis");
      $id_buku = $_GET['id_buku'];
      $id = $_GET['id'];

      $update = $this->bukupenulis->delete(array('id_bukupenulis'   => $id));
      if($update){
        $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menghapus data buku penulis";
        header("Location: index.php?hal=bukupenulis&action=penulis&id=".$id."&success=true");
      } else {
        $_SESSION['SUCCESS_MESSAGE'] = "Gagal menghapus data buku penulis";
        header("Location: index.php?hal=bukupenulis&action=penulis&id=".$id."&success=false");
      }
		}

    public function simpan(){
			$this->model("bukupenulis");

      if($_SERVER["REQUEST_METHOD"] == "POST") {
					$id_buku  = isset($_POST["id_buku"]) ? $_POST["id_buku"] : "";
					$id_penulis     = isset($_POST["id_penulis"]) ? $_POST["id_penulis"] : "";

          $param = array(
							'id_penulis'   => $id_penulis,
							'id_buku'   => $id_buku
            );
            $insert = $this->bukupenulis->insert($param);
            if($insert){
              $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menambah buku penulis";
              header("Location: index.php?hal=bukupenulis&action=penulis&id=".$id_penulis."&success=true");
            } else {
              $_SESSION['SUCCESS_MESSAGE'] = "Gagal menambah buku penulis";
              header("Location: index.php?hal=bukupenulis&action=penulis&id=".$id_penulis."&success=false");
            }
      } else {
        echo "fuck you";
      }
		}
	}
?>

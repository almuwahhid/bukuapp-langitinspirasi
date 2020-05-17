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
	include "library/util.class.php";
	class BukuController extends BaseAdminController{
		public function index(){
			$this->model("buku");
			$this->model("penulis");

			$result = array();
			$result['page'] = "buku";
			$result['account'] = json_decode($_SESSION['data']);
			$result['buku'] = $this->buku->getBuku();

			$this->template('buku/daftarbuku', $result);
		}

		public function tambah(){
			$this->model("penulis");

			$result = array();
			$result['page'] = "buku";
			$result['action'] = "tambah";
			$result['account'] = json_decode($_SESSION['data']);
			$result['penulis'] = $this->penulis->getPenulis();

			$this->template('buku/formbuku', $result);
		}

    public function edit(){
			$this->model("penulis");
			$this->model("buku");

      $id = $_GET['id'];

			$result = array();
			$result['page'] = "buku";
			$result['action'] = "edit";
			$result['account'] = json_decode($_SESSION['data']);
			$result['penulis'] = $this->penulis->getPenulis();
			$result['buku'] = $this->buku->getWhere(array('id_buku'   => $id))[0];

			$this->template('buku/formbuku', $result);
		}

    public function delete(){
			$this->model("buku");

      $id = $_GET['id'];

      $update = $this->buku->delete(array('id_buku'   => $id));
      if($update){
        $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menghapus Buku";
        header("Location: index.php?hal=buku&success=true");
      } else {
        $_SESSION['SUCCESS_MESSAGE'] = "Gagal menghapus buku";
        header("Location: index.php?hal=buku&success=false");
      }
		}

    public function simpan(){
			$this->model("buku");

      if($_SERVER["REQUEST_METHOD"] == "POST") {
					$nama_buku  = isset($_POST["nama_buku"]) ? $_POST["nama_buku"] : "";
					$harga  = isset($_POST["harga"]) ? $_POST["harga"] : "";
					$id_penulis     = isset($_POST["id_penulis"]) ? $_POST["id_penulis"] : "";
					$tahun_terbit     = isset($_POST["tahun_terbit"]) ? $_POST["tahun_terbit"] : "";
					$id     = isset($_POST["id"]) ? $_POST["id"] : "";
					$action     = isset($_POST["action"]) ? $_POST["action"] : "";

          $param = array(
							'nama_buku'   => $nama_buku,
							'harga'   => $harga,
							'id_penulis'      => $id_penulis,
							'tahun_terbit'     => $tahun_terbit
            );
          if($action == "edit"){
            $update = $this->buku->update($param, array('id_buku'   => $id));
            if($update){
              $_SESSION['SUCCESS_MESSAGE'] = "Berhasil mengedit Buku";
              header("Location: index.php?hal=buku&action=edit&id=".$id."&success=true");
            } else {
              $_SESSION['SUCCESS_MESSAGE'] = "Gagal mengedit Buku";
              header("Location: index.php?hal=buku&action=edit&id=".$id."&success=false");
            }
          } else {
            $insert = $this->buku->insert($param);
            if($insert){
              $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menambah buku";
              header("Location: index.php?hal=buku&success=true");
            } else {
              $_SESSION['SUCCESS_MESSAGE'] = "Gagal menambah buku";
              header("Location: index.php?hal=buku&success=false");
            }
          }
      } else {
        echo "fuck you";
      }
		}
	}
?>

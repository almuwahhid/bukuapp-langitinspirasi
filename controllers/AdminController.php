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
	class AdminController extends BaseAdminController{
		public function index(){
			$this->model("admin");

			$result = array();
			$result['page'] = "admin";
			$result['account'] = json_decode($_SESSION['data']);
			$result['admin'] = $this->admin->get();

			$this->template('admin/daftaradmin', $result);
		}

		public function tambah(){
			$this->model("admin");

			$result = array();
			$result['page'] = "admin";
			$result['action'] = "tambah";
			$result['account'] = json_decode($_SESSION['data']);

			$this->template('admin/formadmin', $result);
		}

    public function edit(){
			$this->model("admin");
      $id = $_GET['id'];

			$result = array();
			$result['page'] = "admin";
			$result['action'] = "edit";
			$result['account'] = json_decode($_SESSION['data']);
			$result['admin'] = $this->penulis->getWhere(array('id_admin'   => $id))[0];

			$this->template('admin/formadmin', $result);
		}

    public function delete(){
			$this->model("admin");
      $id = $_GET['id'];

      $update = $this->admin->delete(array('id_admin'   => $id));
      if($update){
        $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menghapus data admin";
        header("Location: index.php?hal=admin&success=true");
      } else {
        $_SESSION['SUCCESS_MESSAGE'] = "Gagal menghapus data admin";
        header("Location: index.php?hal=admin&success=false");
      }
		}

    public function simpan(){
			$this->model("admin");

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_admin  = isset($_POST["nama_admin"]) ? $_POST["nama_admin"] : "";
				$username_admin  = isset($_POST["username_admin"]) ? $_POST["username_admin"] : "";


        if($this->admin->getWhereRows(array('username_admin' => $username_admin)) > 0){
          $_SESSION['SUCCESS_MESSAGE'] = "Maaf Username ".$username_admin." sudah digunakan";
          header("Location: index.php?hal=admin&action=tambah&success=false");
        } else {
					$param = array(
							'username_admin'   => $username_admin,
							'nama_admin'   => $nama_admin,
							'password_admin'   => "202cb962ac59075b964b07152d234b70"
						);
						$insert = $this->admin->insert($param);
						if($insert){
							$_SESSION['SUCCESS_MESSAGE'] = "Admin telah ditambahkan";
							?>
							<script type="text/javascript">
								window.location.replace("index.php?hal=admin&success=true");
							</script>
							<?
						} else {
							$_SESSION['SUCCESS_MESSAGE'] = "Gagal menambah data Admin";
							header("Location: index.php?hal=admin&action=tambah&success=false");
						}
        }
      } else {
        echo "fuck you";
      }
		}
	}
?>

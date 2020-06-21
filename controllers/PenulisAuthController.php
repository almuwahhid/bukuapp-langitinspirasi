<?php
	/**
     * @Author  : Langit Inspirasi <web@langitinspirasi.co.id>
     * @Date    : 26/05/17 - 3:06 AM
	 * @Phone   : 0856-2555-665
	 *
	 * @Warning : Please don't delete this notes !
    */
	// use \Controller;
	include "library/util.class.php";
	class PenulisAuthController extends Controller{
		public function index(){
			echo "Hello";
		}

		public function konfirmasiakun(){
			$this->model("penulis");
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$username  = isset($_POST["username"]) ? $_POST["username"] : "";
				$hash  		 = isset($_POST["hash"]) ? $_POST["hash"] : "";
				$password  = isset($_POST["password"]) ? md5($_POST["password"]) : "";
				$sesi_data = $this->penulis->getWhere(array('hash' => $hash))[0];

				if($username == trim($username) && strpos($username, ' ') != false){
					$_SESSION['SUCCESS_MESSAGE'] = "Jangan gunakan username dengan spasi";
					header("Location: index.php?hal=penulisauth&success=false&action=auth&hash=".$hash);
				} else {
					if(count($this->penulis->getWhereNotIn(array('username_penulis'   => $sesi_data->username_penulis), array('username_penulis'   => $username))) == 0){
							$param = array(
								'username_penulis'   => $username,
								'password_penulis'   => $password,
								'active'   => "1",
								'hash'   => ""
							);

							$insert = $this->penulis->update($param, array('hash'   => $hash));
							if($insert){
								header("Location: index.php");
							} else {
								$_SESSION['SUCCESS_MESSAGE'] = "Gagal mengkonfirmasi Penulis";
								header("Location: index.php?hal=penulisauth&success=false&action=auth&hash=".$hash);
							}
					} else {
						// echo count($this->penulis->getWhereNot(array('username_penulis'   => $username)));
						$_SESSION['SUCCESS_MESSAGE'] = "Username yang Anda masukkan sudah digunakan pengguna lain";
						header("Location: index.php?hal=penulisauth&success=false&action=auth&hash=".$hash);
					}
				}
			}
		}

		public function auth(){
			$this->model("penulis");
			if(isset($_GET["hash"])) {
				$hash  = isset($_GET["hash"]) ? $_GET["hash"] : "";
				$data = $this->penulis->getWhere(array('hash' => $hash));
				if(count($data) > 0){
					$penulis = $data[0];
					$result = array();
					$result['result'] = true;
					$result['message'] = "Hash tidak tersedia";
					$result['hash'] = $hash;
					$result['penulis'] = $penulis;
					$this->template('penulis/formverifikasipenulis', $result);
				} else {
					$result = array();
					$result['result'] = false;
					$result['message'] = "Hash tidak tersedia";
					$this->template('penulis/formverifikasipenulis', $result);
				}
			} else {
				$result = array();
				$result['result'] = false;
				$result['message'] = "Hash tidak tersedia";
				$this->template('penulis/formverifikasipenulis', $result);
			}
		}
	}
?>

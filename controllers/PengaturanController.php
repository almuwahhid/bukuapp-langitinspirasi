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
	class PengaturanController extends BaseAdminController{
		public function index(){
			$result = array();
			$result['page'] = "pengaturan";
			$result['account'] = json_decode($_SESSION['data']);

      switch ($_SESSION['level']) {
        case 'admin':
          $this->template('admin/pengaturanadmin', $result);
          break;
        case 'penulis':
          $this->template('penulis/pengaturanpenulis', $result);
          break;
        case 'pemilik':
          $this->template('pemilik/pengaturanpemilik', $result);
          break;
        default:

          break;
      }
		}

		public function simpanBioAdmin(){
			$this->model("admin");
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$nama_admin  = isset($_POST["nama_admin"]) ? $_POST["nama_admin"] : "";
				$username  = isset($_POST["username_admin"]) ? $_POST["username_admin"] : "";

				$param = array(
					'nama_admin'   => $nama_admin
				);

					$insert = $this->admin->update($param, array('username_admin'   => $username));
					if($insert){
						$_SESSION['data'] = json_encode($this->admin->getWhere(array('username_admin'   => $username))[0]);
						$_SESSION['SUCCESS_MESSAGE'] = "Biodata Admin telah diupdate";
						header("Location: index.php?hal=pengaturan&success=true");
					} else {
						$_SESSION['SUCCESS_MESSAGE'] = "Gagal menambah data Admin";
						header("Location: index.php?hal=pengaturan&success=false");
					}
			}
		}

		public function simpanBioPenulis(){
			$this->model("penulis");
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$nama_penulis  = isset($_POST["nama_penulis"]) ? $_POST["nama_penulis"] : "";
				$jk  = isset($_POST["jk"]) ? $_POST["jk"] : "";
				$id_penulis  = isset($_POST["id_penulis"]) ? $_POST["id_penulis"] : "";
				$username  = isset($_POST["username"]) ? $_POST["username"] : "";
				$sesi_data = json_decode($_SESSION['data']);

				if($username == trim($username) && strpos($username, ' ') != false){
					$_SESSION['SUCCESS_MESSAGE'] = "Jangan gunakan username dengan spasi";
					header("Location: index.php?hal=pengaturan&success=false");
				} else {
					if(count($this->penulis->getWhereNotIn(array('username_penulis'   => $sesi_data->username_penulis), array('username_penulis'   => $username))) == 0){
							$param = array(
								'nama_penulis'   => $nama_penulis,
								'jk_penulis'   => $jk,
								'username_penulis'   => $username
							);

							$insert = $this->penulis->update($param, array('id_penulis'   => $id_penulis));
							if($insert){
								$_SESSION['data'] = json_encode($this->penulis->getWhere(array('id_penulis'   => $id_penulis))[0]);
								$_SESSION['SUCCESS_MESSAGE'] = "Biodata Penulis telah diupdate";
								header("Location: index.php?hal=pengaturan&success=true");
							} else {
								$_SESSION['SUCCESS_MESSAGE'] = "Gagal mengubah biodata Penulis";
								header("Location: index.php?hal=pengaturan&success=false");
							}
					} else {
						// echo count($this->penulis->getWhereNot(array('username_penulis'   => $username)));
						$_SESSION['SUCCESS_MESSAGE'] = "Username yang Anda masukkan sudah digunakan pengguna lain";
						header("Location: index.php?hal=pengaturan&success=false");
					}
				}
			}
		}

		public function simpanBioPemilik(){
			$this->model("pemilik");
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$nama_pemilik  = isset($_POST["nama_pemilik"]) ? $_POST["nama_pemilik"] : "";
				$jk  = isset($_POST["jk"]) ? $_POST["jk"] : "";
				$id  = isset($_POST["id"]) ? $_POST["id"] : "";
				$username  = isset($_POST["username"]) ? $_POST["username"] : "";
				$sesi_data = json_decode($_SESSION['data']);

				if($username == trim($username) && strpos($username, ' ') != false){
					$_SESSION['SUCCESS_MESSAGE'] = "Jangan gunakan username dengan spasi";
					header("Location: index.php?hal=pengaturan&success=false");
				} else {
					if(count($this->pemilik->getWhereNotIn(array('username_pemilik'   => $sesi_data->username_pemilik), array('username_pemilik'   => $username))) == 0){
							$param = array(
								'nama_pemilik'   => $nama_pemilik,
								'jk_pemilik'   => $jk,
								'username_pemilik'   => $username
							);

							$insert = $this->pemilik->update($param, array('id_pemilik'   => $id));
							if($insert){
								$_SESSION['data'] = json_encode($this->pemilik->getWhere(array('id_pemilik'   => $id))[0]);
								$_SESSION['SUCCESS_MESSAGE'] = "Biodata Pemilik telah diupdate";
								header("Location: index.php?hal=pengaturan&success=true");
							} else {
								$_SESSION['SUCCESS_MESSAGE'] = "Gagal mengubah biodata Pemilik";
								header("Location: index.php?hal=pengaturan&success=false");
							}
					} else {
						// echo count($this->penulis->getWhereNot(array('username_penulis'   => $username)));
						$_SESSION['SUCCESS_MESSAGE'] = "Username yang Anda masukkan sudah digunakan pengguna lain";
						header("Location: index.php?hal=pengaturan&success=false");
					}
				}
			}
		}

    public function simpanpassword(){
			$user = json_decode($_SESSION['data']);

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id  = isset($_POST["id"]) ? $_POST["id"] : "";
				$password_saatini  = isset($_POST["password_saatini"]) ? md5($_POST["password_saatini"]) : "";
				$password_baru  = isset($_POST["password_baru"]) ? md5($_POST["password_baru"]) : "";
				$ulangi_password_baru  = isset($_POST["ulangi_password_baru"]) ? md5($_POST["ulangi_password_baru"]) : "";

				if($password_baru != $ulangi_password_baru){
					$_SESSION['SUCCESS_MESSAGE'] = "Password baru belum sesuai";
					header("Location: index.php?hal=pengaturan&success=false");
				} else {
					switch ($_SESSION['level']) {
						case 'admin':
							$this->model("admin");
							if($password_saatini != $user->password_admin){
								$_SESSION['SUCCESS_MESSAGE'] = "Password yang Anda masukkan salah";
								header("Location: index.php?hal=pengaturan&success=false");
							} else {
								$param = array(
									'password_admin'   => $password_baru
								);
								$insert = $this->admin->update($param, array('id_admin'   => $id));
								if($insert){
									$_SESSION['data'] = json_encode($this->admin->getWhere(array('id_admin'   => $id))[0]);
									$_SESSION['SUCCESS_MESSAGE'] = "Password berhasil diupdate";
									header("Location: index.php?hal=pengaturan&success=true");
								} else {
									$_SESSION['SUCCESS_MESSAGE'] = "Password gagal diupdate";
									header("Location: index.php?hal=pengaturan&success=false");
								}
							}
							break;
							case 'penulis':
								$this->model("penulis");
								if($password_saatini != $user->password_penulis){
									$_SESSION['SUCCESS_MESSAGE'] = "Password yang Anda masukkan salah";
									header("Location: index.php?hal=pengaturan&success=false");
								} else {
									$param = array(
										'password_penulis'   => $password_baru
									);
									$insert = $this->penulis->update($param, array('id_penulis'   => $id));
									if($insert){
										$_SESSION['data'] = json_encode($this->penulis->getWhere(array('id_penulis'   => $id))[0]);
										$_SESSION['SUCCESS_MESSAGE'] = "Password berhasil diupdate";
										header("Location: index.php?hal=pengaturan&success=true");
									} else {
										$_SESSION['SUCCESS_MESSAGE'] = "Password gagal diupdate";
										header("Location: index.php?hal=pengaturan&success=false");
									}
								}
								break;
								case 'pemilik':
									$this->model("pemilik");
									if($password_saatini != $user->password_pemilik){
										$_SESSION['SUCCESS_MESSAGE'] = "Password yang Anda masukkan salah";
										header("Location: index.php?hal=pengaturan&success=false");
									} else {
										$param = array(
											'password_pemilik'   => $password_baru
										);
										$insert = $this->pemilik->update($param, array('id_pemilik'   => $id));
										if($insert){
											$_SESSION['data'] = json_encode($this->pemilik->getWhere(array('id_pemilik'   => $id))[0]);
											$_SESSION['SUCCESS_MESSAGE'] = "Password berhasil diupdate";
											header("Location: index.php?hal=pengaturan&success=true");
										} else {
											$_SESSION['SUCCESS_MESSAGE'] = "Password gagal diupdate";
											header("Location: index.php?hal=pengaturan&success=false");
										}
									}
									break;
						default:
							break;
					}
				}

      } else {
        echo "fuck you";
      }
		}
	}
?>

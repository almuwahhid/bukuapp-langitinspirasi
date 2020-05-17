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
	class PenulisController extends BaseAdminController{
		public function index(){
			$this->model("penulis");

			$result = array();
			$result['page'] = "penulis";
			$result['account'] = json_decode($_SESSION['data']);
			$result['penulis'] = $this->penulis->get();

			$this->template('penulis/daftarpenulis', $result);
		}

		public function tambah(){
			$this->model("penulis");

			$result = array();
			$result['page'] = "penulis";
			$result['action'] = "tambah";
			$result['account'] = json_decode($_SESSION['data']);

			$this->template('penulis/formpenulis', $result);
		}

    public function edit(){
			$this->model("penulis");
      $id = $_GET['id'];

			$result = array();
			$result['page'] = "penulis";
			$result['action'] = "edit";
			$result['account'] = json_decode($_SESSION['data']);
			$result['penulis'] = $this->penulis->getWhere(array('id_penulis'   => $id))[0];

			$this->template('penulis/formpenulis', $result);
		}

    public function delete(){
			$this->model("penulis");
      $id = $_GET['id'];

      $update = $this->penulis->delete(array('id_penulis'   => $id));
      if($update){
        $_SESSION['SUCCESS_MESSAGE'] = "Berhasil menghapus data penulis";
        header("Location: index.php?hal=penulis&success=true");
      } else {
        $_SESSION['SUCCESS_MESSAGE'] = "Gagal menghapus data penulis";
        header("Location: index.php?hal=penulis&success=false");
      }
		}

    public function simpan(){
			$this->model("penulis");

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_penulis  = isset($_POST["nama_penulis"]) ? $_POST["nama_penulis"] : "";
        $email_penulis  = isset($_POST["email_penulis"]) ? $_POST["email_penulis"] : "";
        $jk_penulis     = isset($_POST["jk_penulis"]) ? $_POST["jk_penulis"] : "";
        $action     = isset($_POST["action"]) ? $_POST["action"] : "";
        $id     = isset($_POST["id"]) ? $_POST["id"] : "";
        $hash = md5(Date('Y-m-d H:i:s'));


        if($this->penulis->getWhereRows(array('email_penulis' => $email_penulis)) > 0){
          $_SESSION['SUCCESS_MESSAGE'] = "Maaf Email ".$email_penulis." sudah digunakan";
          if($action == "edit"){
            header("Location: index.php?hal=penulis&action=edit&id=".$id."&success=false");
          } else {
            header("Location: index.php?hal=penulis&action=tambah&success=false");
          }
        } else {
							if($action == "edit"){
								$param = array(
										'nama_penulis'   => $nama_penulis,
										'jk_penulis'      => $jk_penulis
									);
								$update = $this->penulis->update($param, array('id_penulis'   => $id));
								if($update){
									$_SESSION['SUCCESS_MESSAGE'] = "Berhasil mengedit data Penulis";
									header("Location: index.php?hal=penulis&action=edit&id=".$id."&success=true");
								} else {
									$_SESSION['SUCCESS_MESSAGE'] = "Gagal mengedit data Penulis";
									header("Location: index.php?hal=penulis&action=edit&id=".$id."&success=false");
								}
							} else {
								$param = array(
										'nama_penulis'   => $nama_penulis,
										'email_penulis'   => $email_penulis,
										'jk_penulis'      => $jk_penulis,
										'penulis_date_registered'     => date("Y-m-d"),
										'hash'     => $hash
									);

									$path = PATH."index.php?hal=penulis&action=auth&hash=".$hash;
									$message = <<<EMAIL
									<!DOCTYPE html>
									<html>
										<body>
											<table>
												<tbody>
													<tr style="height: 27px;">
														<td style="height: 27px;">Hi, $nama_penulis</td>
													</tr>
													<tr style="height: 97px;">
														<td style="height: 97px;">Untuk mengaktifkan Akun Anda, klik tombol dibawah ini</td>
													</tr>
													<tr style="height: 36px;">
														<td style="height: 36px;">
															<a href='' target='_blank' href='$path'>Klik disini untuk mengaktifkan Akun</a>
														</td>
													</tr>
													<tr style="height: 75px;">
														<td style="height: 75px;">
															<p>Terimakasih,</p>
															<p>Admin</p>
														</td>
													</tr>
												</tbody>
											</table>
										</body>
									</html>
									EMAIL;
									if($this->send_email($email_penulis, "Konfirmasi Akun Manajemen Buku", $message)){
										$insert = $this->penulis->insert($param);
										if($insert){
											$_SESSION['SUCCESS_MESSAGE'] = "Penulis ditambahkan. Untuk mengaktifkan akun, Penulis dapat mengkonfirmasi terlebih dahulu melalui email";
											?>
											<script type="text/javascript">
												window.location.replace("index.php?hal=penulis&success=true");
											</script>
											<?
										} else {
											$_SESSION['SUCCESS_MESSAGE'] = "Gagal menambah data Penulis";
											header("Location: index.php?hal=penulis&action=tambah&success=false");
										}
										// exit(header("Location: "));
									} else {
										$_SESSION['SUCCESS_MESSAGE'] = "Penulis gagal ditambahkan, email tidak terdaftar";
										?>
										<script type="text/javascript">
											window.location.replace("index.php?hal=penulis&action=tambah&success=false");
										</script>
										<?
										// exit(header("Location: index.php?hal=penulis&success=true"));
									}
							}
        }
      } else {
        echo "fuck you";
      }
		}

		// if($this->penulis->getWhereRows(array('username_penulis' => $username_penulis)) > 0){
		// 	$_SESSION['SUCCESS_MESSAGE'] = "Maaf Username ".$username_penulis." sudah digunakan";
		// 	if($action == "edit"){
		// 		header("Location: index.php?hal=penulis&action=edit&id=".$id."&success=false");
		// 	} else {
		// 		header("Location: index.php?hal=penulis&action=tambah&success=false");
		// 	}
		// } else {
		//
		// }
	}
?>

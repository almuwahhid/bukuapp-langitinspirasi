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
	class HomeController extends BaseAdminController{
		public function index(){
			$this->model("auth");
			$result = array();
			$result['page'] = "dashboard";
			$result['account'] = array();
			$result['account'] = json_decode($_SESSION['data']);
			switch ($_SESSION['level']) {
				case 'penulis':
					$result['account']->nama = $result['account']->nama_penulis;
					break;
				case 'admin':
					$result['account']->nama = $result['account']->nama_admin;
					break;
				case 'pemilik':
					$result['account']->nama = $result['account']->nama_pemilik;
					break;

				default:
					$result['account']->nama = "";
					break;
			}
			$this->template('dashboard', $result);
		}

		public function logout(){
			$_SESSION['logged_in'] = false;
			$_SESSION['data'] = "";
			$_SESSION['level'] = '';
			header("Location: index.php?hal=login");
		}
	}

?>

<?php
	/**
     * @Author  : Langit Inspirasi <web@langitinspirasi.co.id>
     * @Date    : 26/05/17 - 3:06 AM
	 * @Phone   : 0856-2555-665
	 *
	 * @Warning : Please don't delete this notes !
    */

	class LoginController extends Controller{
		public function index(){
			$this->model("auth");

			if($_SERVER["REQUEST_METHOD"] == "POST") {
					$username  = isset($_POST["username"]) ? $_POST["username"] : "";
					$password  = isset($_POST["password"]) ? $_POST["password"] : "";
					$level     = isset($_POST["level"]) ? $_POST["level"] : "";

					switch ($level) {
						case 'admin':
							$result = $this->auth->checkLoginAdmin($username, MD5($password));
							if($result['result']){
								session_start();
								$_SESSION['logged_in'] = true;
								$_SESSION['data'] = json_encode($result['data']);
								$_SESSION['level'] = 'admin';

								header("Location: index.php?hal=home");
							} else {
								$this->template('login', $result);
							}
						break;
						case 'penulis':
							$result = $this->auth->checkLoginPenulis($username, MD5($password));
							if($result['result']){
								session_start();
									$_SESSION['logged_in'] = true;
									$_SESSION['data'] = json_encode($result['data']);
									$_SESSION['level'] = 'penulis';
								header("Location: index.php?hal=home");
							} else {
								$this->template('login', $result);
							}
						break;
						case 'pemilik':
							$result = $this->auth->checkLoginPenulis($username, MD5($password));
							if($result['result']){
								session_start();
								$_SESSION['logged_in'] = true;
								$_SESSION['data'] = json_encode($result['data']);
								$_SESSION['level'] = 'pemilik';
								header("Location: index.php?hal=home");
							} else {
								$this->template('login', $result);
							}
						break;
						default:
						$this->view('login');
						break;
					}
			} else {
				$this->view('login');
			}
		}
	}
?>

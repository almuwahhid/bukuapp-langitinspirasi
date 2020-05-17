<?php
	/**
     * @Author  : Langit Inspirasi <web@langitinspirasi.co.id>
     * @Date    : 26/05/17 - 3:06 AM
	 * @Phone   : 0856-2555-665
	 *
	 * @Warning : Please don't delete this notes !
    */
	// defined('BASEPATH') OR exit('No direct script access allowed');
	class BaseAdminController extends Controller{
    public function __construct() {
        if(isset($_SESSION['logged_in'])){
          if($_SESSION['logged_in'] != true){
            header("Location: index.php?hal=login");
          }
        } else {
					header("Location: index.php?hal=login");
          // header("Location: Aboutus");
        }
    }

		public function send_email( $email, $subject, $body ){
        // $this->load->library('email');
				// use ROOT_PATH.'/library/phpMailer/PHPMailer.php';
				// use ROOT_PATH.'/library/phpMailer/SMTP.php';
				//
				// require (ROOT_PATH.'/vendor/phpmailer/phpmailer/src/Exception.php');
				// require (ROOT_PATH.'/vendor/phpmailer/phpmailer/src/PHPMailer.php');
				// require (ROOT_PATH.'/vendor/phpmailer/phpmailer/src/SMTP.php');
				// require (ROOT_PATH.'/vendor/phpmailer/phpmailer/src/SMTP.php');
				require_once ROOT_PATH.'/vendor/autoload.php';
				// use PHPMailer\PHPMailer\PHPMailer;
				// use PHPMailer\PHPMailer\Exception;
				// require 'PHPMailer-master/src/Exception.php';
				// require 'PHPMailer-master/src/PHPMailer.php';
				// require 'PHPMailer-master/src/SMTP.php';

				// use PHPMailer\PHPMailer\PHPMailer;
				// use PHPMailer\PHPMailer\Exception;

				$mail = new PHPMailer\PHPMailer\PHPMailer();
				$mail->IsSMTP();
				$mail->Mailer = "smtp";

				$mail->SMTPDebug  = 0;
				$mail->SMTPAuth   = TRUE;
				$mail->SMTPSecure = "tls";
				$mail->Port       = 465;
				$mail->Host       = "ssl://smtp.googlemail.com";
				$mail->Username   = "idskitaran@gmail.com";
				$mail->Password   = "1muwahh1d";

        // $config['useragent'] = "Skitaran";
        // $config['mailpath'] = "/usr/bin/mail"; // or "/usr/sbin/sendmail"
        // $config['protocol'] = "smtp";

        // $config['smtp_host'] = "ssl://smtp.googlemail.com";
        // $config['smtp_port'] = 465;
        // $config['mailtype'] = 'html';
        // $config['charset'] = 'utf-8';
        // $config['newline'] = "\r\n";
        // $config['crlf'] = "\r\n";
        // $config['wordwrap'] = TRUE;
        // $config['mailtype'] = 'html';
        // $config['smtp_user'] = "idskitaran@gmail.com";
        // $config['smtp_pass'] = "1muwahh1d";

				$mail->IsHTML(true);
				$mail->AddAddress($email, "recipient-name");
				$mail->SetFrom('no-reply@managebuku.com', "from-name");
				// $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
				// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
				$mail->Subject = $subject;
				$content = $body;

        // $this->email->initialize($config);
        // $this->email->from('no-reply@managebuku.com');
        // $this->email->to($email);
        // $this->email->subject($subject);
        // $this->email->message( $body );
        // $this->email->set_mailtype('html');

        // if($this->email->send()){
        //     return true;
        // }
        // else{
        //     show_error($this->email->print_debugger());
        //     return false;
        // }
				$mail->MsgHTML($content);
				if(!$mail->Send()) {
				  var_dump($mail);
					return false;
				} else {
				  return true;
				}
    }

    public function getDayFromTimestamp($day1, $day2){
      $date1 = new DateTime($day1);
      $date2 = new DateTime($day2);

      $diff = $date2->diff($date1)->format("%a");

      return $diff;
    }

    public function getBiaya($harga, $day1, $day2){
      $day = $this->getDayFromTimestamp($day1, $day2);
      return round($day*$harga);
    }
	}
?>

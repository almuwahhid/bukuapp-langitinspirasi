<?php
	/**
     * @Author  : Langit Inspirasi <web@langitinspirasi.co.id>
     * @Date    : 26/05/17 - 3:06 AM
	 * @Phone   : 0856-2555-665
	 *
	 * @Warning : Please don't delete this notes !
    */

	$hal = (isset($_GET['hal']) && $_GET['hal'] )? $_GET['hal']:'';

	//configuration PATH for website
	define('PATH','http://localhost/pandu/'); //insert your path website
	define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/pandu/'); //insert your path website
	define('SITE_URL', PATH.'index.php');
	define('POSITION_URL', PATH.'?hal='.$hal);
	define('SUCCESS_MESSAGE', "");

	//configuration for Database yout website
	define('DATABASE_HOST','localhost');       //your host database
	define('DATABASE_USERNAME','root'); 	   //your username database
	define('DATABASE_PASSWORD',''); 		   //your password database
	define('DATABASE_NAME','pandu'); //your name database
?>

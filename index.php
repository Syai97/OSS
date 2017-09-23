<?php
	session_set_cookie_params(0);
	session_start();
	error_reporting(E_ALL);
	// 
	//connect & select db
	require('config/db.php');

  	include_once('lib/func.php');


	//cek dah login?
	if (empty($_SESSION['username'])){
       include 'header.php';
        include('home.php');
       include 'footer.php';


	}
	else{//berjaya login
		include 'header.php';

		if(isset($_GET['page']))//cek include page
		include $_GET['page'].'.php';
		else{

			include 'home.php';
		}

		include 'footer.php';
	}
?>

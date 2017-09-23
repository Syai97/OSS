<?php

	// PHP Version 5.5.12
	$online=0 ;  //0 = developement , 1 = live debug , 2= live
	// echo gethostbyname("mar1hadid.000webhostapp.com");
	if($online==0){
	$host="localhost";
	$db="db_online";
	$user="root";
	$pwd="";
	error_reporting(E_ALL);
	}
	else if($online==1){
	 /* https://www.freemysqlhosting.net/account/
mar1.hadid@gmail.com
9@55w0rd_123456 */
	 // $host="localhost";
	/* $db="sql12186093";
	$user="sql12186093";
	$pwd="lZHZuRVA3q"; */
	$host="192.168.1.122";
	$db="db_score";
	$user="root";
	$pwd="password";
	error_reporting(E_ALL);

	}
	else if($online==2){
	$host=" ";
	$db=" ";
	$user=" ";
	$pwd=" ";
	error_reporting(0);
	}




$conn=$con=mysqli_connect($host,$user,$pwd,$db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
// mysqli_select_db($con,"test");

// ...some PHP code for database "test"...

// mysqli_close($con);
?>

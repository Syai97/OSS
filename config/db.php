<?php

	$host="localhost";
	$db="db_online";
	$user="root";
	$pwd="";
	error_reporting(E_ALL);



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

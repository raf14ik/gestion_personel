<?php
	session_start();
	$host ="localhost";
	$dbuser ="root";
	$dbpass ="";
	$db_name ="gestion";
	error_reporting(0);

	$conn = mysqli_connect($host, $dbuser, $dbpass, $db_name);
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  } 

	  if(isset($_SESSION["personnel"])){
	  $userid = $_SESSION["personnel"];

	} 
	else{
		$userid="";
	}
	?>
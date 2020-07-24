<?php 
	# this page for connect to database
	ob_start();
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); #show all error

	$servername = "";
	$username = "";
	$password = "";
	$dbname = "twitterforbook";
	$con = mysqli_connect($servername, $username, $password, $dbname); 

	if (!$con) {
    	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	exit;
	} 

	mysqli_query($con, "SET NAMES UTF8"); 
?>
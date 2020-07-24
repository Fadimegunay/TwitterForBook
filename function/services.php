<?php
include('connect.php');

include('helper_function.php');
include('login.php');
include('index.php');

if(!empty($_GET['do']) && isset($_GET['do']) && $_GET['do'] != "")
{
	unset($_SESSION['message']);

	$func = $_GET['do'];
	$func();
}

# this page allows us to guide functions.
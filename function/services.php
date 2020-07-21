<?php
include('connect.php');

include('helper_function.php');
include('login.php');

if(!empty($_GET['do']) && isset($_GET['do']) && $_GET['do'] != "")
{
	unset($_SESSION['message']);

	$func = $_GET['do'];
	$func();
}
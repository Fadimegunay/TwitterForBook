<?php
	
	function html_encode($txt)
	{
		return htmlentities($txt);
	}

	function html_decode($txt)
	{
		return html_entity_decode($txt);
	}

	function confirmation($str)
	{	
		if(isset($str) &&  trim($str) != "")
			return true;
		else
			return false;
	}

	function real_escape($con,$str)
	{
		return mysqli_real_escape_string($con, $str);
	}
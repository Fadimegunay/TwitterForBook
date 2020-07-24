<?php
	#some helper functions for project
	function html_encode($txt)
	{
		return htmlentities($txt);
	}

	function html_decode($txt)
	{
		return html_entity_decode($txt);
	}

	function confirmation($str)  # Checking the received data
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


	function Paginations($con, $page, $customHeader, $currentPage, $queryTable, $perPage){  # created pagination with received parameter
		$pager = '';
		
		if($currentPage > 0){
			$pager = '<a href="/'.$page.'/p/'.($currentPage - 1).$customHeader.'">&laquo;</a>';
		}

		$result = mysqli_query($con, $queryTable);
		$row = mysqli_num_rows($result);
		$num = (int)($row / $perPage) ;
		if($row % $perPage == 0)
			$num--;
		
		for($i = $currentPage ; $i <= $currentPage+10  ; $i++)
		{
			if($i > $num)
				break;
			$page_active = "";
			if(($i) == $currentPage)
				$page_active = "active";
			$pager .= '<a class="'.$page_active.'" href="/'.$page.'/p/'.($i).$customHeader.'">'.($i+1).'</a>';

		}
		
		//var_dump($currentPage." ".$num);
		
		if($currentPage < $num ){
			$pager .= '<a href="/'.$page.'/p/'.($currentPage + 1).$customHeader.'">&raquo;</a>';
		}
		
		if($pager == ''){
			$pager = '<a class="active" href="/'.$page.'">1</a>';
		}
		return $pager;
	}
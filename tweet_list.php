<?php
	include('function/connect.php');
	include('function/login.php');
	include('function/helper_function.php');

	LoginChecker(); # checking the session

	if(isset($_GET['page'])){ # get the page parameter
		$cPage = (int)$_GET['page'];
	}
	else{
		$cPage = 0;
	 
	}
	$perPage = 10; 
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/css/index.css" rel="stylesheet">
	<link href="/css/tweet_list.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="/js/jquery/jquery.min.js" ></script>
	<title>Twitter for Book</title>
</head>

<body>

<style>
    .center {
        text-align: center;
    }   

    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;
    }

    .pagination a.active {
        background-color: #5e5ebf;
        color: white;
        border: 1px solid #5e5ebf;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<ul>
  <li><a  href="/index">Ana sayfa</a></li>
  <li><a class="active" href="/tweet_list">Geçmiş Tweetler</a></li>
  <li><a href="/log_out">Çıkış</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div  >
	  	<div class="row" style="padding: 12px 20px; margin: 8px 0;">
		    <div class="col-sm-16">
				<table>
					<thead>
						<tr>
						    <th style="padding: 8px;">Geçmiş Tweetler</th>
						</tr>
					</thead>
				  	<tbody>
				  		<?php 
				  			# get the tweet list from database and add to table
                            $query = sprintf("select * from excerpt where username = '%s' order by id DESC  LIMIT %u, %u",$_SESSION['username'],($cPage * $perPage), $perPage);
                            $result = mysqli_query($con, $query);
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                            {
                            	
                        ?>
						  		<tr>
								    <td style="padding: 8px;"><?php echo $row['quote']."\n".$row['source']."\n"."Shared By"." ".$_SESSION['username']; ?></td>
								</tr>
						<?php } ?>
						  
				  	</tbody>
				  
				</table>
			</div>
		</div>
		<div class="row" style="padding: 12px 20px; margin: 8px 0;">
		    <div class="col-sm-16">
				<div class="center">
	                <div class="pagination">

	                    <?php 
	                    	# this function for pagination 
	                    	echo Paginations($con, "tweet_list", "", $cPage, "select * from excerpt order by id DESC" , $perPage); 
	                    ?>
	                </div>
	            </div>
			</div>
		</div>
		
	</div>
</div>

</body>
</html>
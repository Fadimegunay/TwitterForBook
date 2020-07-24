<?php
	include('function/connect.php');
	include('function/login.php');

	login_Check();# checking the session
	
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/css/login.css" rel="stylesheet">
	<script src="/js/jquery/jquery.min.js" ></script>
	<title>Twitter for Book</title>
</head>

<body>
	<div class="page-background">

		<form id="cForm" action="/logins" method="POST">
		  <div class="container">
		    <h2>Kullanıcı Gİrİşİ</h2>
		  </div>
		  <div class="container">    
		    <a type="submit" href="/sign-up">Kayıt Ol</a>
		    
		  </div>
		  <?php
                if(isset($_SESSION['message']))
                {
            ?>
                <p class="alert " style="background-color: #9797bb;
										  padding: 8px;
										  color: white;">  
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']); ?>
                </p>
            <?php } ?>
		  <div class="container">
		    <label for="username"><b>Kullanıcı Adı</b></label>
		    <input type="text" id="username" placeholder="Kullanıcı Adı" name="username" required>
		  </div>
		  <div class="container">
		    <label for="password"><b>Şifre</b></label>
		    <input type="password" id="password" length= 6 placeholder="Şifre" name="password" required>
		  </div> 
		  

		</form>
	</div>

	<script type="text/javascript">
		//this function ,for have not a 'login button' , getting to login datas with 'enter keyboard '.
		$(document).ready(function () { 
            $('#cForm').change(function(){
	            var username = $("#username").val(); 
	            var password = $("#password").val(); 
	            //console.log(username+"--"+password);
	            if(username.length >0 && password.length >0 ){
	            	let datas = $("#cForm").serializeArray();
	            	//console.log(datas);
	            	$.ajax({
	            		url: "/logins", 
	            		data: $.param(datas), 
				        type: "POST"
				    }).done(function(result) {
	                    //console.log(result);
	                    if(result == 1) { // if login datas is true , go to index page
	                        window.location = "/index";
	                    }else{ // else go to login page again
	                    	//console.log(result);
	                    	window.location = "/login"
	                    }
	                });

            	}
            });
        }); 

	</script>
</body>
</html>

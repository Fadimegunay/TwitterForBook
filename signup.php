<?php
	include('function/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/css/login.css" rel="stylesheet">
	<title>Twitter for Book</title>
</head>

<body>
	<div class="page-background">

		<form action="/usersignup" method="POST">
		  <div class="container">
		    <h2>Kayıt Oluştur</h2>
		  </div>
		    <?php
                if(isset($_SESSION['message']))
                {
            ?>
                <p class="alert alert-danger">  
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']); ?>
                </p>
            <?php } ?>
		  <div class="container">
		    <label for="username"><b>Kullanıcı Adı</b></label>
		    <input type="text" placeholder="Kullanıcı Adı" name="username" required>
		  </div>
		  <div class="container">
		    <label for="password"><b>Şifre</b></label>
		    <input type="password" placeholder="Şifre" name="password" required>
		  </div> 
		  <div class="container">    
		    <button type="submit" >Kaydet </button> 
		    
		  </div>

		</form>
	</div>
</body>
</html>

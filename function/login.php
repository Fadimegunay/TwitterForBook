<?php
	
	

	function login(){
		if(confirmation($_POST['username']) && confirmation($_POST['password']) ){
			$username = real_escape($GLOBALS['con'], $_POST['username']);
			$password = md5($_POST['password']);

			$query = sprintf("select * from users where username = '%s' and password = '%s' ", $username, $password );
			$result = mysqli_query($GLOBALS['con'], $query);
			$count = mysqli_num_rows($result);
			//var_dump($query);
			if($count >0 ){
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$_SESSION['username'] = $row['username'];

				echo 1;
			}
			else{
				$_SESSION['message'] = "Girmiş Olduğunuz Kullanıcı Adı veya Şifre Yanlış";
				echo 0;
			}
		}else{
			$_SESSION['message'] = "Lütfen tüm alanları doldurunuz";
		    echo 0;
		}
	}

	function signup(){
		if(confirmation($_POST['username']) && confirmation($_POST['password']) ){ 

			$user_name  =  real_escape($GLOBALS['con'],$_POST['username']);
			$password  =  md5($_POST['password']);

			$query = sprintf("select id from users where  username='%s'",$user_name);
			$result = mysqli_query($GLOBALS['con'], $query);
			$count = mysqli_num_rows($result);

			if($count > 0){
				$_SESSION['message'] = "Girmiş Olduğunuz Kullanıcı Adı kullanılmaktadır.";
				header('Location: /sign-up');
			}
			else{

				$query = sprintf("INSERT INTO users (username, password) VALUES ('%s', '%s' )", $user_name, $password );
				$result = mysqli_query($GLOBALS['con'], $query);
				if($result){

					$_SESSION['message'] = "Kayıt işlemi başarıyla gerçekleştirildi.";
					header('Location: /login');
					
				}
				else{
					$_SESSION['message'] = "Kayıt işlemi gerçekleştirilirken bir hata oluştu";
					header('Location: /sign-up');
				}
			}
		}
		else{
			$_SESSION['message'] = "Lütfen tüm alanları doldurunuz.";
		    header('Location: /sign-up');
		}

	}

	function LoginChecker(){
		if(isset($_SESSION['username']))
		{
			header('Location: /index');
		}
	}
	
	function logout(){
		session_destroy(); 
		header('Location: /login');
	}
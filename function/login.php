<?php
	
	# this page for login and sign-up functions

	function login(){ # checking login 
		if(confirmation($_POST['username']) && confirmation($_POST['password']) ){ # Checking the received data
			$username = real_escape($GLOBALS['con'], $_POST['username']);
			$password = md5($_POST['password']); #the password get encrypted with md5 function

			$query = sprintf("select * from users where username = '%s' and password = '%s' ", $username, $password );
			$result = mysqli_query($GLOBALS['con'], $query);
			$count = mysqli_num_rows($result);
			//var_dump($query);
			if($count >0 ){  # if there is a user with this information, the process completing
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$_SESSION['username'] = $row['username']; # session write for username

				echo 1;
			}
			else{ #display the error message
				$_SESSION['message'] = "Girmiş Olduğunuz Kullanıcı Adı veya Şifre Yanlış";
				echo 0;
			}
		}else{
			$_SESSION['message'] = "Lütfen tüm alanları doldurunuz";
		    echo 0;
		}
	}

	function signup(){ # sign up function
		if(confirmation($_POST['username']) && confirmation($_POST['password']) ){  # Checking the received data

			$user_name  =  real_escape($GLOBALS['con'],$_POST['username']);
			$password  =  md5($_POST['password']);

			$query = sprintf("select id from users where  username='%s'",$user_name); #checking the database .
			$result = mysqli_query($GLOBALS['con'], $query);
			$count = mysqli_num_rows($result);

			if($count > 0){ # if the username has been used , go to sign-up page
				$_SESSION['message'] = "Girmiş Olduğunuz Kullanıcı Adı kullanılmaktadır.";
				header('Location: /sign-up');
			}
			else{ #if the username has not been used , add to database

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

	function LoginChecker(){ # checking the session for username. if there is not a user, go to login page
		# this function for index and tweet_list page
		if(!isset($_SESSION['username']))
		{
			header('Location: /login');
		}
	}

	function login_Check(){# checking the session for username. if there is a user, go to index page
		# this function for login and sign-up page
		if(isset($_SESSION['username']))
		{
			header('Location: /index');
		}
	}
	
	function logout(){
		session_destroy(); #session empty and go to login page
		header('Location: /login');
	}
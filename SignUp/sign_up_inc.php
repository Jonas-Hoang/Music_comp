<?php
	if(isset($_POST['signup-submit'])){

		include_once '../dbconnect.php';

		$username= $_POST['uid'];
		$email = $_POST['mail'];
		$fullName = $_POST['fname'];
		$password = $_POST['pass'];
		$confirmPassword = $_POST['cpass'];

		if(empty($username) )
			{
				header("Location: ../Signup/sign_up.php?error=emptyfield&uid=".$username."&mail=".$email);
				exit();
			}
			else if (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
				header("Location: ../Signup/sign_up.php?error=invalidmail&mailusername=");
				exit();
			}
			else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
				{
					header("Location: ../Signup/sign_up.php?error=invalidmail&username=".$username);
					exit();
				}
			else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
				{
					header("Location: ../Signup/sign_up.php?error=invalidusername&mail=".$mail);
					exit();
				}
			else if (empty($fullName)){
				header("Location: ../Signup/sign_up.php?error=emptyfield&fname=&username".$username."&mail=".$email);
				exit();
			}
			else if ($password !==$confirmPassword) 
				{
					header("Location: ../Signup/sign_up.php?error=passwordcheckusername=".$username."&email=".$email);
					exit();
				}
			else{
				$sql = "select user_name from tai_khoan where user_name =?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../Signup/sign_up.php?error=sqlerror");
					exit();
				}
				else{
					mysqli_stmt_bind_param($stmt,"s",$username);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultCheck = mysqli_stmt_num_rows($stmt);
					if($resultCheck>0){
						header("Location: ../Signup/sign_up.php?error=usertaken&mail=".$email);
						exit();
					}
					else{
						$stmt = mysqli_stmt_init($conn);
						$hashedPass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
						$sql = "Insert into tai_khoan (user_name,pass,full_name,email) values ('".$username."','".$hashedPass."','".$fullName."','".$email."')";
						mysqli_query($conn, $sql);
						mysqli_stmt_execute();
						header("Location: ../Login/login.php");
						exit();
						
						// if(!mysqli_stmt_prepare($stmt,$sql)){
						// 	header("Location: ../Signup/sign_up.php?error=sqlerror");
						// 	exit();
						// }
						// else{
							
							
							
							
						// }
					}
				}
			}	
		mysqli_stmt_close($stmt);
		mysqli_close($conn);	
	}
	

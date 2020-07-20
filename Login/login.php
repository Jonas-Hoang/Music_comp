<?php
session_start();
// Create connection


$conn = new mysqli("localhost", "root", "123456","nguoi_dung");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

mysqli_connect("localhost", "root", "123456","nguoi_dung");
if(isset($_POST['username'])){
	$uName = $_POST['username'];
	$pwd = $_POST['password'];
	$sql = "select * from tai_khoan where user_name ='".$uName."' and pass='".$pwd."' limit 1 ";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1){
		$_SESSION['user_name']=$_POST['username'];
		header("Location: ../s_login.php");
		exit();
	}
	else{
		
		echo "<script>alert('bạn đã nhập sai password')</script>";
		
		exit();
	}
}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Login kpop music</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Music Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="js/csript.js"></script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="//fonts.googleapis.com/css?family=Reem+Kufi&amp;subset=arabic" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //web-fonts -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
</head>

<body>
	<!-- title -->
	<h1>
		<span>M</span>usic
		<span>K</span>-pop
		<span>L</span>ogin
	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
		<form action="#" method="POST">
			<div class="form-style-agile">
				<label>
					Username
					<i class="fas fa-user"></i>
				</label>
				<input placeholder="Username" name="username" type="text" required="" id="username">
			</div>
			<div class="form-style-agile">
				<label>
					Password
					<i class="fas fa-unlock-alt"></i>
				</label>
				<input placeholder="Password" name="password" type="password" required="" id="password">
			</div>
			<!-- checkbox -->
			<div class="wthree-text">
				<ul>
					<li>
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>Remember me</span>
						</label>
					</li>
					<li>
						<a href="#">Forgot Password?</a>
					</li>
					<li>
						<a href="../Signup/sign_up.php">Register</a>
					</li>
				</ul>
				
			</div>
			<!-- //checkbox -->
			<input type="submit" value="Log In">
			<!-- social icons -->
	
		</form>
	</div>


	<!-- copyright -->
	<div class="footer">
		<p>
			&copy; 2020 Music Kpop Login. All rights reserved | Design by Jonas
		</p>
		<a href="file:///C:/Users/ACER/Desktop/Music_Comp/idk.html#contact">Back</a>
	</div>
	

</body>

</html>
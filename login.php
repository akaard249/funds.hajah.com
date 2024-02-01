<?php 
$error = "";
include('api/con.php');

if (isset($_POST["login"])){
	$uname = $_POST["username"];
	$pass = $_POST["password"];
	
	$result = mysqli_query($con,"select * from users where user_id = '$uname' and user_password = '$pass' ");
	if(mysqli_num_rows($result)> 0 ){
		$user_data = mysqli_fetch_assoc($result);
		$type = $user_data["user_type"];
		
		setcookie("username","$uname",time() + 31536000000);
		setcookie("stat","logged" , time() + 31536000000);
		setcookie("type","$type" , time() + 31536000000);
		
	header("location:index.php");	
 
}
    else{
		
		$error ="<div class=\"alert alert-danger alert-dismissible\">
  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Unable To Login!</strong> Either Username Or Password is wrong . Try Again!.
</div>";
    }

  
    
}

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="favicon.png" type="image/png" />
    <title>Najahat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_page/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_page/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_page/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_page/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_page/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_page/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_page/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_page/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_page/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login_page/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="login.php" method="post" class="login100-form validate-form">
					
						<i align="center"><img src="login_page/logo.png"></i>
					

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" type="submit">
							Login
						</button>
					</div>
					<div><?php echo $error ; ?></div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login_page/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login_page/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login_page/vendor/bootstrap/js/popper.js"></script>
	<script src="login_page/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login_page/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login_page/vendor/daterangepicker/moment.min.js"></script>
	<script src="login_page/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login_page/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login_page/js/main.js"></script>

</body>
</html>
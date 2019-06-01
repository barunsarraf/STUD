<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register|STUD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="new/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="new/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="new/css/util.css">
	<link rel="stylesheet" type="text/css" href="new/css/main.css">
<!--===============================================================================================-->
</head>
<body style="  height: 100%;
    background-image: url(backgroundregister.svg);
    background-size:100% 100%;
    -o-background-size: 100% 100%;
    -webkit-background-size: 100% 100%;
    background-size:cover;" 
>

				<form class="login100-form validate-form" style=" margin: 0 auto;padding-top: 100px; 
				width:310px;" align="center" action="reg_process.php" method="post">
					<span class="login100-form-title" style="align-self: center;" align="left">
						STUD
						<br><span align="text-center" style="font-size: small;"><b>S</b>HARE  |  <b>T</b>HOUGHTS  |  <b>U</b>SER  |  <b>D</b>IRECTLY<br>LOGIN</span>
										</span>
									

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="full_name" placeholder="Full Name" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Input Unique Username">
						<input class="input100" type="text" name="u_name" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email_id" placeholder="Email" recquired>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="reg_password" id="mypwd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" >
							Register
						</button>
					</div>

					<div class="text-center p-t-136" style="margin-top: -50px">
						<a class="txt2" href="index.html">
						
							Login
						</a>
					</div>


					
				</form>
	
</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Member Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="UI_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="UI_login/css/util.css">
		<link rel="stylesheet" type="text/css" href="UI_login/css/main.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" href="UI_asset/css/animate.css">
		<link rel="stylesheet" href="UI_asset/css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="UI_asset/css/bootstrap.css">
		<base href="{{asset('')}}">
		<!-- Flexslider  -->
		<link rel="stylesheet" href="UI_asset/css/flexslider.css">
		<!-- Theme style  -->
		<link rel="stylesheet" href="UI_asset/css/style.css">
		<link rel="stylesheet" href="UI_asset/css/add.css">
		<!-- Modernizr JS -->
		<script src="UI_asset/js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		@include('../menu')
		<div class="wrap-login100 ui" >
			<div class="login100-pic js-tilt" data-tilt>
				<img src="UI_login/images/img-01.png" alt="IMG">
			</div>
			<form class="login100-form validate-form" action="signin.html" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<span class="login100-form-title">
					Member Login
				</span>
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-user-shield"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn btnlogin" type="submit">
					Login
					</button>
				</div>
				<div align="center" class="txt1">
				</div>
				<div class="text-center ">
					<a class="txt2" href="register.html">
						Create New Account
						<i aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
@include('../footer')
<script src="UI_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="UI_login/vendor/select2/select2.min.js"></script>
<script src="UI_login/vendor/tilt/tilt.jquery.min.js"></script>
<script >
	$('.js-tilt').tilt({
		scale: 1.1
	})
</script>
<script src="UI_login/js/main.js"></script>
</body>
</html>
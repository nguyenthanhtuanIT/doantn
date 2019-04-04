<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Member Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" type="text/css" href="UI_login/css/util.css">
		<link rel="stylesheet" type="text/css" href="UI_login/css/main.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" href="UI_asset/css/bootstrap.css">
		<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
		<link rel="stylesheet" href="UI_asset/css/animate.css">
		<link rel="stylesheet" href="UI_asset/css/icomoon.css">
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
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="UI_login/images/img-01.png" alt="IMG">
			</div>
			<form  style='margin-top:-150px ' class="login100-form validate-form" action="register.html" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<span class="login100-form-title">
					Member Register
				</span>
				@foreach ($errors->all() as $err)
				<div class="alert alert-danger">{{$err}}</div>
				@endforeach
				@if (session('thongbao'))
				<div class="alert alert-success">
					{{session('thongbao')}}
				</div>
				@endif
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="fullname" placeholder="Full name">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-user-tie"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "email is @gmail.com">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="phone" placeholder="Phone">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-phone-square"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "address is required">
					<input class="input100" type="text" name="address" placeholder="Address">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-map-marked"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="username" placeholder="Username" id="username">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-user-shield"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "password is required">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="passwordAgain" placeholder="Password Again">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn btnlogin" type="submit">
					Register
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@include('../footer')
<script src="UI_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script>
	$('#username').blur(function(){
		var us = $(this).val();
		$.get('check/' + us, function(data){
			if (data == 1)
			{
				alert('Username ready exits ');
			}
		});
	});
</script>
<script src="UI_login/vendor/select2/select2.min.js"></script>
<script src="UI_login/vendor/tilt/tilt.jquery.min.js"></script>
<script >
	$('.js-tilt').tilt({
		scale: 1.1
	});
</script>
<script src="UI_login/js/main.js"></script>
</body>
</html>
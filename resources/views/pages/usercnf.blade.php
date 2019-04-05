<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Config User</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="{{asset('')}}">
		<link rel="stylesheet" type="text/css" href="UI_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="UI_login/css/util.css">
		<link rel="stylesheet" type="text/css" href="UI_login/css/main.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" href="UI_asset/css/bootstrap.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" href="UI_asset/css/animate.css">
		<link rel="stylesheet" href="UI_asset/css/icomoon.css">
		<link rel="stylesheet" href="UI_asset/css/bootstrap.css">
		<link rel="stylesheet" href="UI_asset/css/flexslider.css">
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
			@foreach ($customer as $cus)
			<form  style='margin-top:-150px ' class="login100-form validate-form" action="configuser/{{$cus->id}}" method="post">

				<span class="login100-form-title">
					Cập nhật thông tin khách hàng
				</span>
				@if (session('thongbao'))
				<div class="alert alert-success">
					{{session('thongbao')}}
				</div>
				@endif
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				@if(Auth::check())
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
				@endif
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="fullname"
					value="{{$cus->name}}">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-user-tie"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="email"
					value="{{$cus->email}}">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="phone"
					value="{{$cus->phone}}">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-phone-square"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" name="address"
					value="{{$cus->address}}">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fas fa-map-marked"></i>
					</span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn btnlogin" type="submit">
					Hoàn thành
					</button>
				</div>

			</form>
			@endforeach
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
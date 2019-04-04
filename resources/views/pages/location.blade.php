<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Beautiful place</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
		<base href="{{asset('')}}">
		<!-- Animate.css -->
		<link rel="stylesheet" href="UI_asset/css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="UI_asset/css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="UI_asset/css/bootstrap.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="UI_asset/css/magnific-popup.css">
		<!-- Flexslider  -->
		<link rel="stylesheet" href="UI_asset/css/flexslider.css">
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="UI_asset/css/owl.carousel.min.css">
		<link rel="stylesheet" href="UI_asset/css/owl.theme.default.min.css">

		<!-- Flaticons  -->
		<link rel="stylesheet" href="UI_asset/fonts/flaticon/font/flaticon.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="UI_asset/css/style.css">
		<link rel="stylesheet" href="UI_asset/css/add.css">
		<!-- Modernizr JS -->
		<script src="UI_asset/js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>

		<div class="colorlib-loader"></div>
		<div id="page">
			@include('../menu')
			<aside id="colorlib-breadcrumbs">
				<div class="container">
					<div class="row">
						<div class="col-md-12 breadcrumbs text-center">
							<h2>Beautiful place</h2>
							@if (Auth::check())
							<p style="color:#ffffff">Hi, {{Auth::user()->username}}</p>
							@endif
						</div>

					</div>
				</div>
			</aside>
			<div id="colorlib-container">
				<div class="container">
					<div class="row">
						<div class="content">
							@foreach ($location as $lo)
							<article class="blog-flex">
								@foreach ($image as $img)
								@if($lo->image_id == $img->id)
								{{-- <a  style="background-image: url(upload/{{$img->name}});"></a> --}}
								<img class="half blog-img" style="width: 500px;height: 180px" src="upload/{{$img->name}}" alt="">
								@endif
								@endforeach
								<div class="half">
									<div class="desc">
										<h2><a href="blog.html"></a></h2>
										<p class="first-letra mar">
										<strong>Code: </strong> {{$lo->code}}</p>
										<p class="first-letra mar">
										<strong>Name: </strong> {{$lo->name}}</p>
										<p class="first-letra mar">
										<strong>Address: </strong> {{$lo->address}}</p>
										<div class="a">
											<p class="btnbook"><a href="detaillocation/{{$lo->id}}" class="btn btn-primary btn-custom">Read more </a></p>
										</div>
									</div>
								</div>
							</article>
							@endforeach
							<div class="desc">
								<p class="first-letra"></p>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<p class="pagination">
										{{$location->links()}}
										<p>
										</div>
									</div>
								</div>
								{{-- <aside class="sidebar">
									<div class="side">
										<div class="form-group">
											<input type="text" class="form-control" id="search" placeholder="Enter any key to search...">
											<button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
										</div>
									</div>
									<div class="side-wrap">
										<h2 class="sidebar-heading">Recent Post</h2>
										<div class="f-entry">
											<a href="#" class="featured-img" style="background-image: url(images/blog-1.jpg);"></a>
											<div class="desc">
												<h3><a href="#">The Most Popular Leg Workout for Women</a></h3>
											</div>
										</div>
									</div>
								</aside> --}}
							</div>
						</div>
					</div>
					@include('../footer')
				</div>
				<div class="gototop js-top">
					<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
				</div>
				<!-- jQuery -->
				<script src="UI_asset/js/jquery.min.js"></script>
				<!-- jQuery Easing -->
				<script src="UI_asset/js/jquery.easing.1.3.js"></script>
				<!-- Bootstrap -->
				<script src="UI_asset/js/bootstrap.min.js"></script>
				<!-- Waypoints -->
				<script src="UI_asset/js/jquery.waypoints.min.js"></script>
				<!-- Flexslider -->
				<script src="UI_asset/js/jquery.flexslider-min.js"></script>
				<!-- Owl carousel -->
				<script src="UI_asset/js/owl.carousel.min.js"></script>
				<!-- Magnific Popup -->
				<script src="UI_asset/js/jquery.magnific-popup.min.js"></script>
				<script src="UI_asset/js/magnific-popup-options.js"></script>
				<!-- Main -->
				<script src="UI_asset/js/main.js"></script>
			</body>
		</html>
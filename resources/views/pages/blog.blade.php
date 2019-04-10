<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blog page</title>
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
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
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
					@foreach ($detail as $dt)
					@foreach ($company as $c)
					@if ($dt->tour->company_id == $c->id)
					<div class="col-md-12 breadcrumbs text-center">
						<h2>Dịch vụ của {{$c->name}} </h2>
						<p class="text_info">{{$c->email}} | Hotline: {{$c->phone}}</p>
						@endif
						@endforeach
						@if (Auth::check())
						<p class="text_info">Xin chào, {{Auth::user()->username}}</p>
						@endif
					</div>
				</div>
			</aside>
			<div id="colorlib-container">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<article class="blog-entry">
								<div class="blog-wrap">
									<h2 class="text-center"><a href="blog.html">{{$dt->tour->title}}</a></h2>
									<div class="blog-image">
										<div class="owl-carousel owl-carousel2 blog-item">
											@foreach ($image as $img)
											@if ($img->tour_id == $dt->tour_id)
											<div class="item">
												<a href="#" class="blog image-popup-link" style="background-image: url(upload/{{$img->name}})">
												</a>
											</div>
											@endif
											@endforeach
										</div>
									</div>
									<div class="desc">
										<p class="first-letra">{!!$dt->detail!!}</p>
									</div>
								</article>
								@endforeach
								<div class="comment-box">
									<h2 class="colorlib-heading-2">
									{{count($comment)}} Comments </h2>
									@foreach ($comment as $com)
									<div class="comment-post">
										<div class="user" style="background-image: url(upload/avtc.png);"></div>
										<div class="desc" id="comment-content">
											<p>{{$com->content}}</p>
										</div>
										@if (Auth::check() &&
										$com->user_id == Auth::user()->id)
										<form action="delcomment/{{$com->id}}"
											method="post">
											<input type="hidden" name="_token"
											value="{{csrf_token()}}">
											<button type="submit" class='edit_comment' id="del">Del</button>
										</form>
										@endif
									</div>
									@endforeach
									<div class="comment-area">
										<h2 class="colorlib-heading-2">Bình luận</h2>
										@foreach ($detail as $d)
										<input type="hidden" value="{{$d->tour_id}}" id="idtour">
										@endforeach
											<input type="hidden" name="_token" value="{{csrf_token()}}" />
											<div class="row form-group">
												<div class="col-md-12">
													@if (Auth::check())
													<input type="hidden"
													value="{{Auth::user()->id}}" id="userid">
													<textarea name="content" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
												</div>
												<div class="form-group">
													<button type="button" style="margin-top:20px;"class="btn btn-primary" id="post">Đăng</button>
												</div>
												@else
												<div class="alert alert-danger">Đăng nhập để bình luận</div>
												@endif

										</div>
									</div>
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
					<script src="UI_asset/js/owl.carousel.min.js"></script>
					<!-- Flexslider -->
					<script src="UI_asset/js/jquery.flexslider-min.js"></script>
					<!-- Main -->
					<script src="UI_asset/js/main.js"></script>
					<script>
						$('#post').click(function(){
							var id = $('#idtour').val();
							var iduser = $('#userid').val();
							var content = $('#message').html();
							alert(content);
							// $.get('detail/' + id + '/' + iduser + '/' + content,
							// 	function(data){
							// 	alert(data);
							// });
						});
					</script>
				</body>
				</html>
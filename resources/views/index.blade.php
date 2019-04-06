<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Webtour_Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" href="UI_asset/css/animate.css">
		<link rel="stylesheet" href="UI_asset/css/icomoon.css">
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
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
		<div class="colorlib-loader"></div>
		<div id="page" id="pages">
			@include('menu')
			<aside id="colorlib-hero">
				<div class="flexslider">
					<ul class="slides">
						@foreach ($slide as $sl)
						<li style="background-image: url(upload/{{$sl->name}});">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
										<div class="slider-text-inner">
											<div class="desc">
												<h1><span class="text-center"><small>{{$sl->id}}</small></span> top 10 danh lam thắng cảnh việt nam</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</aside>
			<img class="mess" id="img-show" style="" src="upload/mess.png">
			<img class="mess" id="img-hide" style="" src="upload/hide.png">
			<div id="colorlib-container">
				<div class="container">
					<div class="row" id="dd">
						<div class="content">
							@foreach ($dstour as $t)
							@foreach ($image as $img)
							@if ($img->tour_id == $t->id)
							<article class="blog-flex">
								<a href="blog/{{$t->id}}" class="half blog-img" style="background-image: url(upload/{{$img->name}});"></a>
								@endif
								@endforeach
								<div class="half">
									<div class="desc">
										@if (Auth::check())
										<input type="hidden" value="{{Auth::user()->id}}" id="user_id">
										@endif
										<h2><a href="blog/{{$t->id}}">{{$t->title}}</a></h2>
										<p class="first-letra mar"><strong>Lộ trình: </strong>{{$t->route}}</p>
										<p class="first-letra mar"><strong>Phương tiện: </strong>{{$t->mean}}</p>
										<p class="first-letra mar"><strong>Bắt đầu: </strong>{{$t->time_start}}</p>
										<p class="first-letra mar"><strong>Kết thúc: </strong>{{$t->time_end}}</p>
										<p class="first-letra mar"><strong>Số lượng: </strong>{{$t->amount}}</p>
										<p class="first-letra mar" id="status"><strong>Trạng thái: </strong>{{$t->status}}</p>
										<p class="first-letra mar"><strong>Mô tả: </strong>{{$t->description}}</p>
										<p class="first-letra mar"><strong>Giá: </strong>{{number_format($t->price)}} <i>vnđ</i></p>
										<div class="a">
											@if (Auth::check())
											<p class="btnbook"><a href="bookstour.html/{{$t->id}}" class="btn btn-primary btn-custom"
											id="books">Đặt tour </a></p>
											@else
											<p class="btnbook"><a href="login.html" class="btn btn-primary btn-custom"
											id="books">Đặt tour </a></p>
											@endif
											<p class="btnbook"><a href="blog/{{$t->id}}" class="btn btn-primary btn-custom  btndetail">Chi tiết </a>
										</p>
									</div>
								</div>
							</div>
						</article>
						@endforeach
						<div class="row">
							<div class="col-md-12 text-center">
								<ul class="pagination">
									{{$dstour->links()}}
								</ul>
							</div>
						</div>
					</div>
					<aside class="sidebar">
						<div id="translate_select"></div>
						<div class="side">
							<form action="" method="get">
								<div class="form-group">
									<input type="hidden" name="_token"
									value="{{csrf_token()}}">
									<input type="text" class="form-control" id="search-inp" placeholder="Search with title" name="keyword">
									<button id="search-btn" type="button" class="btn btn-primary"><i class="icon-search3"></i></button>
								</div>
							</form>
						</div>
						<div class="side-wrap">
							<h2 class="sidebar-heading">Tour nổi bật</h2>
							@foreach ($image as $img)
							@foreach ($tournb as $tnb)
							@if ($tnb->id == $img->tour_id)
							<div class="f-entry" style="padding:2px;">
								<a href="blog/{{$tnb->id}}" class="featured-img" style="background-image: url(upload/{{$img->name}});"></a>
								<div class="desc" style="padding-top:15px">
									<h4>
									<a href="blog/{{$tnb->id}}">
									{{$tnb->title}}</a>
									</h4>
								</div>
							</div>
							@endif
							@endforeach
							@endforeach
						</div>
					</aside>
				</div>
			</div>
		</div>

		@include('footer')
	</div>
	<div id="chatbox" style="position:fixed; right:100px; bottom:10px;" class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/Web-tour-362396054483972/?modal=admin_todo_tour" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	<!-- jQuery -->
	<script src="UI_asset/js/jquery.min.js"></script>
	<script type="text/javascript"
	src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
	</script>
	<!-- jQuery Easing -->
	<script>
		$('#search-btn').click(function(){
			var key = $('#search-inp').val();
			$.get('search/' + key, function(data){
				$("#dd").html(data);
			});
		});
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({pageLanguage: 'vi'},
				'translate_select');
		}
	</script>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
			fjs.parentNode.insertBefore(js, fjs);
		}
		(document, 'script', 'facebook-jssdk'));
		$('#chatbox').hide();
		$('#img-hide').hide();
		$('#img-show').click(function(){
			$('#chatbox').show();
			$('#img-hide').show();
			$(this).hide();
		});
		$('#img-hide').click(function(){
			$('#chatbox').hide();
			$('#img-show').show();
			$(this).hide();
		});
	</script>
	<script src="UI_asset/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="UI_asset/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="UI_asset/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="UI_asset/js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="UI_asset/js/main.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<div id="fb-root"></div>
</body>
</html>
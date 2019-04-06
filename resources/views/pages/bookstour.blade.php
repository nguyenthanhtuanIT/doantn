<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bookstour pages</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{{asset('')}}">
	<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="UI_asset/css/animate.css">
	<link rel="stylesheet" href="UI_asset/css/icomoon.css">
	<link rel="stylesheet" href="UI_asset/css/bootstrap.css">
	<link rel="stylesheet" href="UI_asset/css/flexslider.css">
	<link rel="stylesheet" href="UI_asset/fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="UI_asset/css/books.css">
	<link rel="stylesheet" href="UI_asset/css/style.css">
	<link rel="stylesheet" href="UI_asset/css/add.css">
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
						<h2>Đặt tour </h2>
						<p class="text_info"></p>
					</div>
				</div>
				@if (session('thongbao'))
				<div class="alert alert-success" align="center">
					{{session('thongbao')}}
				</div>
				@endif
			</aside>
			<div class="row">
				<div class="col-md-6 content-book cont" align="center">
					<h3 class="title-bill">Thông tin khách hàng</h3>
					@foreach ($customer as $cus)
					@if (Auth::user()->id == $cus->user_id)
					<div>
						<label class="label-text">Họ tên :</label>
						<input class="inp-text" type="text" name="fullname"
						value="{{$cus->name}}" readonly>
					</div>
					<div>
						<label class="label-text" >Email :</label>
						<input class="inp-text" type="text" name="email" value="{{$cus->email}}" readonly>
					</div>
					<div>
						<label class="label-text">Địa chỉ :</label>
						<input class="inp-text" type="text" name="address" value="{{$cus->address}}" readonly>
					</div>
					<div>
						<label class="label-text">Điện thoại:</label>
						<input class="inp-text" type="text" name="phone" value="{{$cus->phone}}" readonly>
					</div>
					@endif
					@endforeach
				</div>
				<div class="col-md-6 content-book cont" align="center">
					<h3 class="title-bill">Đặt tour</h3>
					<form action="bookstour.html" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
						<input type="hidden" name="company_id" value="{{$tour->company_id}}" />
						<input type="hidden" name="tag_id" value="{{$tour->tag_id}}" />
						<input type="hidden" name="title" value="{{$tour->title}}" />
						<input type="hidden" name="route" value="{{$tour->route}}" />
						<input type="hidden" name="mean" value="{{$tour->mean}}" />
						<input type="hidden" name="time_start" value="{{$tour->time_start}}" />
						<input type="hidden" name="time_end" value="{{$tour->time_end}}" />
						<input type="hidden" name="description"
						value="{{$tour->description}}" />
						<input type="hidden" name="price" value="{{$tour->price}}" />
							<input type="hidden" name="tour_id"value="{{$tour->id}}"  readonly>
						<div>
							<label class="label-text">Tour:</label>
							<input class="inp-text" type="text" name="tour"
							value="{{$tour->title}}"  readonly>
						</div>
						@if ($tour->status == 'Còn trống')
						<div>
							<label class="label-text" >Số lượng :</label>
							<input id="num" style="height: 50px;margin-right: 300px" class="inp-text" type="number" name="amount"  min="1"
							max="{{$tour->amount}}" required>
						</div>
						@else
						<div>
							<label class="label-text" >Số lượng :</label>
							<input id="full" class="inp-text" type="text" value="Hết lượt"
							readonly>
						</div>
						@endif
						<div>
							<label class="label-text">Giá :</label>
							<input class="inp-text" type="text" name="price"
							value="{{$tour->price}}" id="price" readonly>
						</div>
						<div>
							<label class="label-text">Thành tiền :</label>
							<input id= "total" class="inp-text" type="text" name="totalprice" readonly>
						</div>
						<div>
							<button type="submit" class="btn btn-primary btn-custom btn-b" style="margin-right:150px;" id="books">Đặt tour </button>
						</div>
					</form>
				</div>
			</div>
			@include('../footer')
		</div>
		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
		</div>
		<script src="UI_asset/js/jquery.min.js"></script>
		<script>
			$('#num').blur(function(){
				var num = $('#num').val();
				var price = $('#price').val();
				$('#total').val(num*price);
			});
			if ($('#full').val() == "full")
			{
				$('#books').hide();
			}
		</script>
		<script src="UI_asset/js/jquery.easing.1.3.js"></script>
		<script src="UI_asset/js/bootstrap.min.js"></script>
		<script src="UI_asset/js/jquery.waypoints.min.js"></script>
		<script src="UI_asset/js/jquery.flexslider-min.js"></script>
		<script src="UI_asset/js/main.js"></script>
	</body>
	</html>
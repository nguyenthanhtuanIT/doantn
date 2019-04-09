<div class="content">
	@if (count($dstour) > 0)
	@foreach ($dstour as $t)
	@foreach ($image as $img)
	@if ($img->tour_id == $t->id)
	<article class="blog-flex">
		<a href="#" class="half blog-img" style="background-image: url(upload/{{$img->name}});"></a>
		@endif
		@endforeach
		<div class="half">
			<div class="desc">
				@if (Auth::check())
				<input type="hidden" value="{{Auth::user()->id}}" id="user_id">
				@endif
				<h2><a href="blog.html">{{$t->title}}</a></h2>
				<p class="first-letra mar"><strong>Lộ trình: </strong>{{$t->route}}</p>
				<p class="first-letra mar"><strong>Phương tiện: </strong>{{$t->mean}}</p>
				<p class="first-letra mar">
					<strong>Bắt đầu: </strong>{{$t->time_start}}
				</p>
				<p class="first-letra mar"><strong>Kết thúc: </strong>{{$t->time_end}}</p>
				<p class="first-letra mar"><strong>Số lượng: </strong>{{$t->amount}}</p>
				<p class="first-letra mar"><strong>Trạng thái: </strong>{{$t->status}}</p>
				<p class="first-letra mar">
				<strong>Mô tả: </strong>{{$t->description}}</p>
				<p class="first-letra mar"><strong>Giá: </strong>
					{{number_format($t->price)}} <i>vnđ</i></p>
				<div class="a">
					@if (Auth::check())
					<p class="btnbook"><a href="bookstour.html/{{$t->id}}" class="btn btn-primary btn-custom"
					id="books">Đặt tour </a></p>
					@else
					<p class="btnbook"><a href="login.html" class="btn btn-primary btn-custom"
					id="books">Đặt tour </a></p>
					@endif
					<p class="btnbook"><a href="blog/{{$t->id}}" class="btn btn-primary btn-custom  btndetail">Chi tiết </a></p>
				</div>
			</div>
		</div>
	</article>
	@endforeach
	@else
	<div class="alert alert-danger"><p>Không tìm thấy từ khóa liên quan</p></div>
	@endif
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<ul class="pagination">
				{{$dstour->links()}}
			</ul>
		</div>
	</div>
</div>
<aside class="sidebar">
	<div class="alert alert-danger">
		<p>Bạn đang tìm: <strong> {{$key}} </strong></p>
	</div>
	<div class="side-wrap">
		<h2 class="sidebar-heading">Tour nổi bật</h2>
		@foreach ($image as $img)
		@foreach ($tournb as $tnb)
		@if ($tnb->id == $img->tour_id)
		<div class="f-entry">
			<a href="blog/{{$tnb->id}}" class="featured-img" style="background-image: url(upload/{{$img->name}});"></a>
			<div class="desc">
				<h4><a href="blog/{{$tnb->id}}">
				{{$tnb->title}}</a></h4>
			</div>
		</div>
		@endif
		@endforeach
		@endforeach
	</div>

</aside>
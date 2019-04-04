<div class="content">
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
				<p class="first-letra mar"><strong>Route: </strong>{{$t->route}}</p>
				<p class="first-letra mar"><strong>Mean: </strong>{{$t->mean}}</p>
				<p class="first-letra mar">
					<strong>Time start: </strong>{{$t->time_start}}

				</p>
				<p class="first-letra mar"><strong>Time end: </strong>{{$t->time_end}}</p>
				<p class="first-letra mar"><strong>Amount: </strong>{{$t->amount}}</p>
				<p class="first-letra mar"><strong>Status: </strong>{{$t->status}}</p>
				<p class="first-letra mar">
				<strong>Descript: </strong>{{$t->description}}</p>
				<p class="first-letra mar"><strong>Price: </strong>{{number_format($t->price)}} <i>vnd</i></p>
				<div class="a">
					@if (Auth::check())
					<p class="btnbook"><a href="bookstour.html/{{$t->id}}" class="btn btn-primary btn-custom"
					id="books">Books </a></p>
					@else
					<p class="btnbook"><a href="login.html" class="btn btn-primary btn-custom"
					id="books">Books </a></p>
					@endif
					<p class="btnbook"><a href="blog/{{$t->id}}" class="btn btn-primary btn-custom  btndetail">Detail </a></p>
				</div>
			</div>
		</div>
		<ul class="share">
			<li class="text-vertical"><i class="icon-share3"></i></li>
			<li><a href="#"><i class="icon-facebook"></i></a></li>
			<li><a href="#"><i class="icon-googleplus"></i></a></li>
		</ul>
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
	<div class="alert alert-danger">
		<p>You searching with keyword: <strong> {{$key}} </strong></p>
	</div>
	<div class="side-wrap">
		<h2 class="sidebar-heading">Great Tour</h2>
		@foreach ($image as $img)
		@foreach ($tournb as $tnb)
		<div class="f-entry">
			@if ($tnb->id == $img->tour_id)
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
</div>
</aside>
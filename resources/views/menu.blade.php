<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="/">Webtour</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="/"><i class="fas fa-home"></i>
						Trang chủ</a></li>
						<li><a href="location">Thắng cảnh </a></li>
						<li><a href="aboutme.html">Giới thiệu</a></li>
						@if (Auth::check())
						<li><a href="logout">Đăng xuất</a></li>
						<li><a href="configuser/{{Auth::user()->id}}">
						Cài đặt</a></li>
						@else
						<li><a href="login.html">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
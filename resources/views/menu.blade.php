<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="index.html">Webtour</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="index.html"><i class="fas fa-home"></i>
						Home</a></li>
						<li><a href="location">Place</a></li>
						<li><a href="aboutme.html">About Me</a></li>
						@if (Auth::check())
						<li><a href="logout">Logout</a></li>
						<li><a href="configuser/{{Auth::user()->id}}">
						Setting</a></li>
						@else
						<li><a href="login.html">Login</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
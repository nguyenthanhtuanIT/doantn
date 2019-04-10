	@foreach ($comment as $com)
	<div class="comment-post">
		<div class="user" style="background-image: url(upload/avtc.png);"></div>
		<div class="desc" id="comment-content">
			<p>{{$com->content}}</p>
		</div>
		@if (Auth::check() && $com->user_id == Auth::user()->id)
		<form action="delcomment/{{$com->id}}"
			method="post">
			<input type="hidden" name="_token"
			value="{{csrf_token()}}">
			<button type="submit" class='edit_comment' id="del">Del</button>
		</form>
		@endif
	</div>
	@endforeach
	{{-- <h1>hhhhhh</h1> --}}
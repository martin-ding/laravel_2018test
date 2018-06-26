@extends("layout.base")

@section("content")

    @include("posts.post")

    <!-- comments -->
    @if(count($post->comments))
    <div class="comments">
    	<ul class="list-group">

    	@foreach($post->comments as $comment)
    		<li class="list-group-item">
				<!-- <div class="alert alert-success" role="alert"> -->
				{{ $comment->content }} : <b>{{ $comment->created_at->diffForHumans()}}</b>
				<!-- </div> -->
			</li>
	  	@endforeach
	  	</ul>
	</div>
	@endif


	<div class="well">
		@include("layout.error")
		<form action="/posts/{{ $post->id }}/comments" method="post">
			{{ csrf_field() }}
			{{ method_field("PATCH") }}
			<div class="form-group">
				<label>Comment</label>
				<textarea type="text" class="form-control" name="content" required="required"></textarea>
			</div>
  			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
@endsection

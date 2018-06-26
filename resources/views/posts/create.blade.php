@extends("layout.base")
@section("content")

@include("layout.error")

<form method="post" action="/posts">
	{{ csrf_field() }}
  <div class="form-group">
    <label>Title</label>
    <input class="form-control" name="title" required="required">
  </div>
  <div class="form-group">
    <label>Body</label>
    <input class="form-control" name="body" required="required">
  </div>
  <div class="checkbox">
    <label>
      <input name="complete" type="checkbox" value="1"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection
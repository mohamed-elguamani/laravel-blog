@extends('pages.master')

@section('title',"$tag->name")

@section('content')


<div class="row">

	<div class="col-md-8">
		<h1>{{$tag->name}} Tag - <small>{{$tag->posts()->count()}} Posts</small></h1>
	</div>

	<div class="col-md-4">
		<a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-primary edit-btn">Edit</a>
	</div>

</div>
<hr>

<table class="table table-striped">
  <tr>
  	<th>#id</th>
  	<th>#name</th>
  	<th>#tags</th>
  	<th>#</th>
  </tr>

  @foreach($tag->posts as $post)
  	<tr>
  		<td>{{$post->id}}</td>
  		<td>{{$post->title}}</td>
  		<td>
  			@foreach($post->tags as $tag)
  				<span class="label label-default">{{$tag->name}}</span>
  			@endforeach
  		</td>
  		<td><a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-info">View</a></td>
  	</tr>
  @endforeach

</table>


@endsection
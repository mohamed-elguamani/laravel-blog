@extends('pages.master')

@section('title',"Edit $tag->name Tag")

@section('content')

<div class="row">
	
	<h1> Edit {{ $tag->name}} Tag</h1>
	<hr>

	<form class="form-inline" method="post" action="{{route('tag.update',['id'=>$tag->id])}}">
	  {{ csrf_field() }}
	  {{ method_field('PUT') }}	
	  <div class="form-group">
	    <label for="name">name:</label>
	    <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
	  </div>
	  <button type="submit" class="btn btn-success">Edit</button>
	</form>

</div>


@endsection
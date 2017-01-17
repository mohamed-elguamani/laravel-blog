@extends('pages.master')

@section('title','List of tags')

@section('content')

<div class="col-md-12">
	
	<h4>Add new tag</h4>
	<form class="form-inline" method="post" action="{{route('tag.store')}}">

	 {{ csrf_field() }}			

	  <div class="form-group">
	    <label for="category">Name:</label>
	    <input type="text" class="form-control" id="name" name="name">
	  </div>
	  <button class="btn btn-success">create</button>
	</form>  

</div>
<br>
<hr>
<div class="col-md-12">
<h4>List of tags</h4>
<table class="table table-striped">
  <tr>
  	<th>#id</th>
  	<th>#name</th>
  	<th>#created at</th>
  	<th>#updated at</th>
  	<th>#</th>
  	<th>#</th>
  	<th>#</th>
  </tr>

  @foreach($tags as $tag)
  	<tr>
  		<td>{{$tag->id}}</td>
  		<td>{{$tag->name}}</td>
  		<td>{{date('D M Y',strtotime($tag->created_at))}}</td>
  		<td>{{date('D M Y',strtotime($tag->updated_at))}}</td>
  		<td><a href="{{route('tag.show',['id'=>$tag->id])}}" class="btn btn-info">View</a></td>
  		<td><a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-primary">Edit</a></td>
  		<td> <form action="{{route('tag.destroy',['id'=>$tag->id])}}" method="post"> {{ csrf_field() }}
  		<input type="hidden" name="_method" value="delete"><button class="btn btn-danger"> Delete</button></form></td>
  	</tr>
  @endforeach

</table>
</div>
@endsection

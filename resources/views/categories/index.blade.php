@extends('pages.master')

@section('title','List of categories')

@section('content')

<div class="col-md-12">
	
	<h4>Add new category</h4>
	<form class="form-inline" method="post" action="{{route('category.store')}}">

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
<h4>List of categories</h4>
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

  @foreach($categories as $category)
  	<tr>
  		<td>{{$category->id}}</td>
  		<td>{{$category->name}}</td>
  		<td>{{date('D M Y',strtotime($category->created_at))}}</td>
  		<td>{{date('D M Y',strtotime($category->updated_at))}}</td>
  		<td><a href="#" class="btn btn-info">View</a></td>
  		<td><a href="#" class="btn btn-primary">Edit</a></td>
  		<td> <form action="{{route('category.destroy',['id'=>$category->id])}}" method="post"> {{ csrf_field() }}
  		<input type="hidden" name="_method" value="delete"><button class="btn btn-danger"> Delete</button></form></td>
  	</tr>
  @endforeach

</table>
</div>
@endsection

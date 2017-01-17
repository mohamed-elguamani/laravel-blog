@extends('pages.master')

@section('title','List of posts')

@section('content')

<div class="col-md-12 create-btn">
	<a href="{{route('posts.create')}}" class="btn btn-success">create new post</a>
</div>
<br>
<h4>List of Posts</h4>
<hr>
<table class="table table-striped">
  <tr>
  	<th>#id</th>
  	<th>#title</th>
    <th>#category</th>
  	<th>#created at</th>
  	<th>#updated at</th>
  	<th>#</th>
  	<th>#</th>
  	<th>#</th>
  </tr>

  @foreach($posts as $post)
  	<tr>
  		<td>{{$post->id}}</td>
  		<td>{{$post->title}}</td>
      <td>{{$post->category->name}}</td>
  		<td>{{date('D M Y',strtotime($post->created_at))}}</td>
  		<td>{{date('D M Y',strtotime($post->updated_at))}}</td>
  		<td><a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-info">View</a></td>
  		<td><a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-primary">Edit</a></td>
  		<td> <form action="{{route('posts.destroy',['id'=>$post->id])}}" method="post"> {{ csrf_field() }}
  		<input type="hidden" name="_method" value="delete"><button class="btn btn-danger"> Delete</button></form></td>
  	</tr>
  @endforeach

</table>

<div class="text-center">{{$posts->links()}}</div>

@endsection

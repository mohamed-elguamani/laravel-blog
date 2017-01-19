@extends('pages.master')

@section('title',"Edit comment num $comment->id")

@section('content')

<div class="row">
	
	<div class="col-md-8 col-md-offset-2">

	<h1> Edit comment</h1>
	<hr>
	<form action="{{route('comments.update',['id'=>$comment->id])}}" method="POST" class="form-horizontal">

                    {{ csrf_field() }}

                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="subject" name="name"   value="{{$comment->name}}">
                     </div>

                     <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$comment->email}}">
                     </div>

                    <div class="form-group">
                         <label for="comment">Comment</label>
                         <textarea class="form-control" name="comment" id="comment" rows="10">{{$comment->comment}}</textarea>

                    </div> 

                    <button type="submit" class="btn btn-primary"> Edit comment</button>

                </form>    

	</div>
</div>

@endsection
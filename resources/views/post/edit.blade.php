@extends('pages.master')

@section('title','Edit Post')

<link rel="stylesheet" type="text/css" href="{{ URL::to('css/select2.min.css')}}"> 

@section('content')

	<div class="col-md-8 col-md-offset-2">
			<h2> Edit#{{$post->title}}</h2>
			<hr>

		<form action="{{route('posts.update',['id'=>$post->id])}}" method="POST" class="form-horizontal">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
           {{--  <input type="hidden" name="_method" value="PUT"> --}}
             <div class="form-group">
			    <label for="title">Title</label>
			    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$post->title}}">
			 </div>
			<div class="form-group">
			    <label for="slug">Slug</label>
			    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$post->slug}}">
			 </div>

			<div class="form-group">
			    <label for="category">Category</label>
			    <select class="form-control" id="category" name="category">
			    <option value="{{$post->category->id}}">{{$post->category->name}}</option>
			    <hr>
			    @foreach($categories as $category)
			    	<option value="{{$category->id}}">{{$category->name}}</option>
			    @endforeach	

			    </select>
		    </div>  

		    <div class="form-group">
			    <label for="category">Tags</label>
			    <select class="form-control select2-tags" id="tags" name="tags[]" multiple="multiple">

			    @foreach($tags as $tag)
			    	<option value="{{$tag->id}}">{{$tag->name}}</option>
			    @endforeach	

			    </select>
		    </div>

			<div class="form-group">
			    <label for="body">Body</label>
			    <textarea rows="8" class="form-control" id="body" name="body" placeholder="body">{{$post->body}}</textarea>
			 </div>
            <!-- Add Post Button -->
            <div class="form-group">
               
               <button type="submit" class="btn btn-default btn-info">
                    <i class="fa fa-plus"></i> Edit Post
                </button>
            </div>
        </form>		
	</div>		

@endsection
@section('scripts')
	<script type="text/javascript" src="{{URL::to('js/select2.min.js')}}"></script>
	<script type="text/javascript">
	$('.select2-tags').select2();
		
	$('.select2-tags').select2().val({!!json_encode($post->tags()->getRelatedIds())!!}).trigger("change");
	</script>
@endsection
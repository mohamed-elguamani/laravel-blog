@extends('pages.master')

@section('title',"".$post->title)

@section('content')

            <div class="col-md-8 col-md-offset-2">

           
                <h2>
                    <a href="#">{{ $post->title }}</a>
                </h2>
                <small><a href="{{url('blog/'.$post->slug)}}">{{url('blog/'.$post->slug)}}</a></small>
                <p>
                    by <em>Mohamed El guamani</em>
                </p>
                <em>Category : {{$post->category->name}}</em>

               <p>
                <strong>Tags :</strong>  
                @foreach($post->tags as $tag)
                    <span class="label label-default"> {{$tag->name}}</span>
                @endforeach</p>
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('D j M Y G:i:s T',strtotime($post->created_at))}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{{ $post->body }}</p>

                


            </div>

@endsection
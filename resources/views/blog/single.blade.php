@extends('pages.master')

@section('title','Single Post')

@section('content')

            <div class="col-md-8 col-md-offset-2">

           
                <h2>
                    <a href="#">{{ $post->title }}</a>
                </h2>
                <p class="lead">
                    by <em>Mohamed El guamani</em>
                </p>

               <p>
                <strong>Tags :</strong>  
                @foreach($post->tags as $tag)
                    <span class="label label-default"> {{$tag->name}}</span>
                @endforeach</p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('D j M Y G:i:s T',strtotime($post->created_at))}}</p>
                <em>Category : {{ $post->category->name}}</em>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{{ $post->body }}</p>

            </div>

@endsection
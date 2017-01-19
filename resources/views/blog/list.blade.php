@extends('pages.master')

@section('title','Blog')

@section('content')
    
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 col-md-offset-2">


@foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="{{route('blog.single',['slug'=>$post->slug])}}">{{ $post->title }}</a>
                </h2>
                <p class="lead">
                    by <em>Mohamed El guamani</em>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('D j M Y G:i:s T',strtotime($post->created_at))}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{{ substr($post->body,0,300) }}</p>

                <a class="btn btn-primary" href="{{route('blog.single',['slug'=>$post->slug])}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
@endforeach                

<hr>

                
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="{{$posts->previousPageUrl()}}">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="{{$posts->nextPageUrl()}}">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

        </div>

@endsection
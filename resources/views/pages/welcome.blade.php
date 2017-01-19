@extends('pages.master')

@section('title','Home')

@section('content')
    
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


@foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="{{route('blog.single',['slug'=>$post->slug])}}">{{ $post->title }}</a>
                </h2>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('D j M Y G:i:s T',strtotime($post->created_at))}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{{ substr(strip_tags($post->body),0,300) }}</p>

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

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>

@endsection
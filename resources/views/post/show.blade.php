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

                <hr>

                <h3>Comments <small>{{$post->comments()->count()}} total</small></h3>
                <table class="table table-striped">
                  <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Comment</th>
                    <th>#</th>
                    <th>#</th>
                  </tr>
                    @foreach($post->comments as $comment)

                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td><a href="{{route('comments.edit',['id'=>$comment->id])}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{route('comments.destroy',['id'=>$comment->id])}}" method="post"> {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger"> Delete</button>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach

                 </table> 


            </div>

@endsection
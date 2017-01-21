@extends('pages.master')

@section('title',"$post->title")

@section('content')
        
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <h2>
                    <a href="#">{{ $post->title }}</a>
                </h2>
                 <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('D j M Y G:i:s T',strtotime($post->created_at))}}</p>
               <p>
                <strong>Tags :</strong>  
                @foreach($post->tags as $tag)
                    <span class="label label-default"> {{$tag->name}}</span>
                @endforeach</p>
                <em><strong>Category :</strong> {{ $post->category->name}}</em>
                <hr>
                @if(isset($post->image))
                <img class="img-responsive" src="{{asset('images/'.$post->image)}}" alt="">
                @endif
                <hr>
                <p>{!!$post->body !!}</p>

            </div>
        </div>
        
        <div class="row">

             <div class="col-md-8 col-md-offset-2">
                <hr>
                 <h2>Comments</h2>   
                <hr>
                @foreach($post->comments as $comment)
                <div class="comment">
                    <p><strong>{{$comment->name}}</strong></p>
                    <p>{{$comment->comment}}</p><br>

                </div>
                    
                  
                @endforeach
                <hr>
                <form action="{{route('comments.store',['id_post'=>$post->id])}}" method="POST" class="form-horizontal">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="subject" name="name" placeholder="Your name">
                     </div>

                     <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                     </div>

                    <div class="form-group">
                         <label for="comment">Comment</label>
                         <textarea class="form-control" name="comment" id="comment" placeholder="type your comment here ..."></textarea>

                    </div> 

                    <button type="submit" class="btn btn-primary"> Send your comment</button>

                </form>      


             </div>


        </div> 

@endsection
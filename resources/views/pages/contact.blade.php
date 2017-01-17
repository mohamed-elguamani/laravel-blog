@extends('pages.master')

@section('title','Contact Us')

@section('content')
     
		
    

    <div class="col-md-8 col-md-offset-2">
    
	    <h2>Contact Us</h2>	
	    
	    <form action="{{url('contact')}}" method="POST" class="form-horizontal">

            {{ csrf_field() }}

             <div class="form-group">
			    <label for="email">E-mail</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="email">
			 </div>

			<div class="form-group">
			    <label for="subject">Subject</label>
			    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
			 </div>

			<div class="form-group">
				 <label for="message">Message</label>
				 <textarea class="form-control" name="message" id="message" placeholder="type your message here ..."></textarea>

			</div> 

			<button type="submit" class="btn btn-primary"> Send</button>

		</form>	 

    </div>	

@endsection
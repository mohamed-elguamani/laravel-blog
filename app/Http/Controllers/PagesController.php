<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

use Session;
use Mail;

class PagesController extends Controller
{
    //
    public function getIndex(){

    	$posts = Post::orderBy('id','desc')->paginate(5);
        
    	return view('pages.welcome',['posts'=> $posts]);
    }

    public function getAbout(){

    	$name="Mohamed EL GUAMANI";

    	return view ('pages.about');
    }

    public function getContact(){

    	return view ('pages.contact');
    }

    public function postContact(Request $request){

        // validate data

        $this->validate($request,[
                'email' => 'required|email',
                'message'=>'required|min:10'
           ]);

        $data=array(

            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodymessage'=>$request->message

            );

        Mail::send('emails.contact',$data, function($message) use($data){
            $message->from($data['email']);
            $message->to('med-96e233@inbox.mailtrap.io');
            $message->subject($data['subject']);

        });

        Session::flash('success','Your email has sended successfully');
        return redirect('/contact');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class BlogController extends Controller
{
    //

	public function index(){

		$posts= Post::paginate(5);
		return view ('blog.list',['posts'=>$posts]);
	}

    public function getSingle($slug){

    	$post = Post::where('slug',$slug)->first();

    	return view ('blog.single',['post'=>$post]);	
    }
}

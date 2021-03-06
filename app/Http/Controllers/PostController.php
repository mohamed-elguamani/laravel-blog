<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;
use App\Tag;
use Purifier;
use Session;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //

        $posts = Post::orderBy('id','desc')->paginate(5);

        return view('post.list',['posts'=>$posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories=Category::all();
        $tags=Tag::all();
        return view('post.create',['categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate data

        $this->validate($request,[
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255[unique:posts,slug',
                'body' => 'required',
                'category'=>'required',
                'image' => 'sometimes|image'
           ]);

        // store data

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);
        $post->category_id=$request->category;

        if($request->hasfile('image')){

            $image=$request->file('image');
            $filename= time() . '.' . $image->getClientOriginalExtension();
            $location=public_path('images/'. $filename);

            Image::make($image)->resize(900,300)->save($location);

            $post->image=$filename;
        }
        
        $post->save();

        $post->tags()->sync($request->tags,false);

        Session::flash('success','The new content was added successfully!');

        // redirect 
        return redirect('/posts/');
        // return redirect()->route('post.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $post= Post::find($id);
        return view('post.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        return view('post.edit',['post'=>$post,'categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       //validate form

        $this->validate($request,[
                'title' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'body' => 'required',
                'category' => 'required',
                'image' => 'image'
        ]);

        // update post and save data

        // get post to update

        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);
        $post->category_id=$request->category;

        if($request->hasfile('image')){

            // add the old image
            $image=$request->file('image');
            $filename= time() . '.' . $image->getClientOriginalExtension();
            $location=public_path('images/'. $filename);

            Image::make($image)->resize(900,300)->save($location);

            $oldfilename=$post->image;

            $post->image=$filename;

            // delele the new photo

            Storage::delete($oldfilename);



        }


        $post->save();
        
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else
        {
            $post->tags()->sync(array());
        }
        
        // $post->update($request->all());

        Session::flash('success','The content was updated successfully!');

        // redirect 
        return redirect('/posts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success','The content was deleted successfully!');
        return redirect('/posts/');
    }
}

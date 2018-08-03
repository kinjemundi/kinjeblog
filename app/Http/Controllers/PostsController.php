<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // \DB::enableQueryLog();
        // $posts = Post::with('author')->get();
        // view('blog.index',compact('posts'));
       
        
        $posts = Post::with('author')
                        ->LatestFirst()
                        ->Published()
                        ->take(4)
                        ->get();
        
        // $next_id = Posts::where('id','>',$post->id)->min('id');
        // $prev_id = Posts::where('id','<',$post->id)->max('id');
        // $next_post = Posts::where('id',$next_id)->first();
        // $prev_post = Posts::where('id',$prev_id)->first();      

        return view('blog.index',compact('posts','prev_id','next_post'));
        // view('blog.index',compact('posts'));
        //  dd(\DB::getQueryLog());
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug',$slug)->first();

        return view('blog.show',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('blog.show');
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
        //
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
    }
}

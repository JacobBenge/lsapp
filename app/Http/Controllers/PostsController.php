<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // bring in the model for Posts
use Illuminate\Support\Facades\DB; // used for executing SQL queries if Eloquent is insufficient

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** 
         * The Post class uses Eloquent ORM to interact with DB
         * 
         * Return all posts unmodified
         * $posts = Post::all(); 
         * 
         * WHERE Clause example
         * $posts = Post::where('title', 'Post Two')->get();
         * 
         * returns all posts ordered by title in descending order, and limit(take) by X. 
         * $posts = Post::orderBy('title','desc')->take(10)->get(); 
         */

        /**
         * RAW SQL example
         * $posts = DB::select('SELECT * FROM posts');
         */

        // order by created_at in desc and prep for pagination by giving the limit (x)
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // with('given_name_for_view', 'variable_name_to_send')  
        // view is found at resources/views/posts/index.blade.php
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Trigger the validation of the request
        $this->validate($request, [
            // array of rules
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create Post
        // Create an instance of the Post class
        $post = new Post;
        // Load the attributes using the data from the request. Validation rules are above
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // Add the user ID of the authenticated user
        $post->user_id = auth()->user()->id;
        // Save the object to DB
        $post->save();

        return redirect('/posts')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lookup a post by id provided in URL
        $post = Post::find($id);
        // return the view and pass along the post attributes
        // view is found at resources/views/posts/show.blade.php
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Lookup a post by id provided in URL
        $post = Post::find($id);
        // return the view and pass along the post attributes
        // view is found at resources/views/posts/edit.blade.php
        return view('posts.edit')->with('post', $post);
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
        // Trigger the validation of the request
        $this->validate($request, [
            // array of rules
            'title' => 'required',
            'body' => 'required'
        ]);

        // Update the existing Post
        // Find the post in DB
        $post = Post::find($id);
        // Load the attributes using the data from the request. Validation rules are above
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // Save the object to DB
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the post
        $post = Post::find($id);
        // Delete the post
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted Successfully');
    }
}

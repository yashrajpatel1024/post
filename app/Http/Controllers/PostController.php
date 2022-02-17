<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(2);
        return view('post.index', compact('posts'));
    }

    public function guestpost()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(2);
        $comment = Comment::count();
        return view('guest-post', compact('posts','comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request::validate([
            'title' => ['required'],
            'description' => ['required'],
            'tags' => ['required'],
        ]);

        Post::create([
            'user_id' => Request::user()->id,
            'title' => Request::input('title'),
            'author' => Request::user()->name,
            'description' => Request::input('description'),
            'tags' => Request::input('tags'),
        ]);

        return Redirect::back()->withStatus(__('Post Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $posts = $post;
        return view('post.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        Request::validate([
            'title' => ['required'],
            'description' => ['required'],
            'tags' => ['required'],
        ]);
        
        $post->update([
            'user_id' => Request::user()->id,
            'title' => Request::input('title'),
            'author' => Request::user()->name,
            'description' => Request::input('description'),
            'tags' => Request::input('tags'),
        ]);
        return Redirect::back()->withStatus(__('Post Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        // $post->comment->delete();
        // $post->delete();

        $comments = Comment::where('post_id',$post->id)->get();
        foreach ($comments as $comment) {
            DB::table('comments')->where('post_id', $comment->post_id)->delete();
        }

        $post->delete();
        return Redirect::route('posts.index');
    }

    public function viewpost(post $posts)
    {
        $post = $posts;
        $comment = Comment::where('post_id',$post->id)->get();
        return view('post.view-post',compact('post','comment'));
    }
}

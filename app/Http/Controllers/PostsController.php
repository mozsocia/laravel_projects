<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:5',
            'body' => 'required',
        ]);

        // return $validatedData;
        $user = auth()->user();

        $user->posts()->create($validatedData);
        // Post::create($validatedData);
        $request->session()->flash('success', 'Post created was successful!');

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (!(auth()->user()->id == $post->user_id)) {
            session()->flash('error', 'You are not allowed !');
            return redirect()->route('post.show', ['post' => $id]);
        }

        return view('posts.create', ['post' => $post]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:5',
            'body' => 'required',
        ]);

        // return $validatedData;
        $post = Post::find($id);

        if (!(auth()->user()->id == $post->user_id)) {

            $request->session()->flash('error', 'You are not allowed to update this post!');
            return redirect()->route('post.show', ['post' => $id]);
        }

        $post->update($validatedData);

        $request->session()->flash('success', 'Post updated was successful!');

        return redirect()->route('post.show', ['post' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!(auth()->user()->id == $post->user_id)) {
            session()->flash('error', 'You are not allowed !');
            return redirect()->route('post.show', ['post' => $id]);
        }

        $post->delete();
        session()->flash('success', 'Post was Deleted successfully!');
        return redirect()->route('post.index');

    }

}

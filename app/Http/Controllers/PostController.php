<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    
    public function index()
    {   

        $allposts = Post::all();

        return view('index',['posts'=>$allposts]);
    }

    
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=> 'required|max:255|min:5',
            'body'=> 'required'
        ]);
        
        $title = $request->input('title');
        $body = $request->input('body');

        $thepost = new Post();

        $thepost->title = $title;
        $thepost->body = $body;
        $thepost->save();

        $request->session()->flash('status', 'Post created successfull');
        return redirect()->route('posts.show',['post'=>$thepost->id]);

    }

    public function show($id)
    {
        $thepost = Post::findOrFail($id);

        return view('show',['post'=>$thepost]);
        
    }

    
    public function edit($id)
    {
        $thepost = Post::findOrFail($id);
        return view('edit',['post'=>$thepost]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'=> 'required|max:255|min:5',
            'body'=> 'required'
        ]);
        $title = $request->input('title');
        $body = $request->input('body');

        $thepost = Post::findOrFail($id);

        $thepost->title = $title;
        $thepost->body = $body;
        $thepost->save();

        $request->session()->flash('status', 'Post Edited successfull');
        return redirect()->route('posts.show',['post'=>$thepost->id]);
    }

    
    public function destroy(Request $request, $id)
    {
        $thepost = Post::findOrFail($id);

        $thepost->delete();

        $request->session()->flash('status', 'Post successfully Deleted');
        return redirect()->route('posts.index');
    }
}

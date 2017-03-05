<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function index()
    {

        $posts = Post::latest()->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month,
         count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view('posts.index', ['posts' => $posts , 'archives' => $archives]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //dd(request()->all());
        // create a new post using a request data
        // Save it to the database

        // And then redirect to the home page

        /*$post = new Post();

        $post->title = request('title');
        $post->body = request('body');

        $post->save();*/

        /*Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);*/

        //validation
        $this->validate( request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');
    }

}

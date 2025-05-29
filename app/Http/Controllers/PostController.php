<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('author_id', Auth::user()->id)->get();
        return view('dashboard.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.post.show', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function delete(Request $request)
    {
        //
    }
}

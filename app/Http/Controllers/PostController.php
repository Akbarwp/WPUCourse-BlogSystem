<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category']))->where('author_id', Auth::user()->id)->paginate(10)->withQueryString();
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

    public function store(PostCreateRequest $request)
    {
        Post::create($request->validated());
        return to_route('dashboard')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.post.edit', compact('post', 'categories'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        return to_route('dashboard')->with('success', 'Post updated successfully');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return to_route('dashboard')->with('success', 'Post deleted successfully');
    }
}

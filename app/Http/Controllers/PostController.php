<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $validated = $request->validated();

        // Uploud Image with Filepond
        if ($request->cover_image) {
            if (!empty($post->cover_image)) {
                Storage::disk('public')->delete($post->cover_image);
            }

            $newFilename = Str::after($request->cover_image, 'tmp/');

            Storage::disk('public')->move($request->cover_image, "img/cover-image/$newFilename");

            $validated['cover_image'] = "img/cover-image/$newFilename";
        }

        Post::create($validated);
        return to_route('dashboard')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.post.edit', compact('post', 'categories'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated = $request->validated();

        // Uploud Image with Filepond
        if ($request->cover_image) {
            if (!empty($post->cover_image)) {
                Storage::disk('public')->delete($post->cover_image);
            }

            $newFilename = Str::after($request->cover_image, 'tmp/');

            Storage::disk('public')->move($request->cover_image, "img/cover-image/$newFilename");

            $validated['cover_image'] = "img/cover-image/$newFilename";
        }

        $post->update($validated);
        return to_route('dashboard')->with('success', 'Post updated successfully');
    }

    public function uploudCoverImage(Request $request)
    {
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('tmp/', 'public');
        }
        return $path;
    }

    public function delete(Post $post)
    {
        if (!empty($post->cover_image)) {
            Storage::disk('public')->delete($post->cover_image);
        }
        $post->delete();
        return to_route('dashboard')->with('success', 'Post deleted successfully');
    }
}

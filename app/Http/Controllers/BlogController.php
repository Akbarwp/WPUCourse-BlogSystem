<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Home';
        return view('blog.index', compact('title'));
    }

    public function post()
    {
        $title = 'Blog';
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
        $search = null;
        if (request('category')) {
            $search = Category::where('slug', request('category'))->first();
        }
        if (request('author')) {
            $search = User::where('username', request('author'))->first();
        }
        return view('blog.post', compact('title', 'posts', 'search'));
    }

    public function show(Post $post)
    {
        $title = 'Blog';
        return view('blog.post-detail', compact('title', 'post'));
    }

    public function about()
    {
        $title = 'About Us';
        return view('blog.about', compact('title'));
    }

    public function contact()
    {
        $title = 'Contact';
        return view('blog.index', compact('title'));
    }
}

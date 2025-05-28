<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::latest()->filter(request(['search', 'category', 'user']))->paginate(6)->withQueryString();
        return view('blog.post', compact('title', 'posts'));
    }

    public function about()
    {
        $title = 'About';
        return view('blog.index', compact('title'));
    }

    public function contact()
    {
        $title = 'Contact';
        return view('blog.index', compact('title'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PortfolioController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)->latest()->get();
        return view('pages.portfolio', compact('posts'));
    }

    public function show(string $id)
    {
        $post = Post::where('published', true)->findOrFail($id);
        return view('pages.post', compact('post'));
    }
}

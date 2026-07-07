<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::where('published', true)->latest()->take(3)->get();
        $setting = Setting::current();

        return view('pages.home', compact('latestPosts', 'setting'));
    }
}

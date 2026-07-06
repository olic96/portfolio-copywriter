<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest('updated_at')->get()
        ]);
    }

    public function edit($id)
    {
        return view('admin.posts.edit', [
            'post' =>Post::findOrFail($id)
        ]);
    }
}

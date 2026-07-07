<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'post' => Post::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genere' => 'required|string|max:50',
            'content' => 'required|string',
            'excerpt' => 'nullable',
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'genere' => $request->genere,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'published' => $request->boolean('published'),
        ]);

        return redirect()->route('admin.posts.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genere' => 'required|string|max:50',
            'content' => 'required|string',
            'excerpt' => 'nullable',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'genere' => $request->genere,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'published' => $request->boolean('published'),
        ]);

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}

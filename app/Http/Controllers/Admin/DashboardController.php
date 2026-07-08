<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Post;
use App\Models\Message;

class DashboardController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'Le credenziali inserite non sono corrette.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function showDashboard()
    {
        $totalPosts = Post::count();
        $totalPubblicPost = Post::where('published', true)->count();
        $totalNoPubblicPost = Post::where('published', false)->count();
        $totalMessages = Message::count();
        $totalMessagesNoRead = Message::where('read', false)->count();
        $latestMesagges = Message::latest()->take(5)->get();
        $latestPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPosts', 'totalPubblicPost', 'totalNoPubblicPost',
            'totalMessages', 'totalMessagesNoRead', 'latestMesagges', 'latestPosts'
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}

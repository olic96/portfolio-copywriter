<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Message;


class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::current();

        return view('pages.contact', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contact')->with('success', 'Messaggio inviato correttamente');
    }
}

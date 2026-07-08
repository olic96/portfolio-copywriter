<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index', [
            'messages' => Message::latest()->get()
        ]);
    }

    public function markAsRead(string $id)
    {
        $message = Message::findOrFail($id)->update(['read' => true]);

        return redirect()->route('admin.messages.index');
    }

    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        $message->update(['read' => true]);

        return view('admin.messages.message', [
            'message' => $message
        ]);
    }

    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index');
    }
}

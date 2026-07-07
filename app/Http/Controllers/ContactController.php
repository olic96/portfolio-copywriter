<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;


class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::current();

        return view('pages.contact', compact('setting'));
    }
}

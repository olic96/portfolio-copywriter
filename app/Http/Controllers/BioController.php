<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class BioController extends Controller
{
    public function index()
    {
        $setting = Setting::current();

        return view('pages.bio', compact('setting'));
    }
}

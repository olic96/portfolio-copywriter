<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::current();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
        ]);

        $setting = Setting::current();
        $setting->update($request->only([
            'site_title', 'hero_title', 'hero_subtitle', 'bio', 'email', 'phone',
        ]));

        return redirect()->route('admin.dashboard');
    }
}


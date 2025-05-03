<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'whatsapp' => 'nullable|string',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = Setting::create([]);
        }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            if ($setting->logo && File::exists(public_path($setting->logo))) {
                File::delete(public_path($setting->logo));
            }

            $logoPath = $request->file('logo')->store('settings', 'public');
            $setting->logo = 'storage/' . $logoPath;
        }

        // Handle Cover Image Upload
        if ($request->hasFile('cover_image')) {
            if ($setting->cover_image && File::exists(public_path($setting->cover_image))) {
                File::delete(public_path($setting->cover_image));
            }

            $coverPath = $request->file('cover_image')->store('settings', 'public');
            $setting->cover_image = 'storage/' . $coverPath;
        }

        // Update other fields
        $setting->fill($request->except(['logo', 'cover_image']));
        $setting->save();

        return redirect()->back()->with('success', __('lang.success_setting_updated'));
    }
}

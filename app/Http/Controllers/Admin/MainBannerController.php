<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainBanner;
use Illuminate\Support\Facades\File;

class MainBannerController extends Controller
{
    public function index()
    {
        $banners = MainBanner::all();
        return view('admin.main_banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.main_banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'media_path' => 'required|file',
            'media_type' => 'required|in:image,video',
            'flag' => 'nullable|boolean',
        ]);

        $filePath = $request->file('media_path')->store('main_banners', 'public');

        $banner = MainBanner::create([
            'media_path' => $filePath,
            'media_type' => $request->media_type,
            'flag' => $request->has('flag'),
        ]);

        if ($request->has('flag')) {
            MainBanner::setActiveBanner($banner->id);
        }

        return redirect()->route('admin.main_banners.index')->with('success', __('lang.banner_created_successfully'));
    }

    public function edit(MainBanner $mainBanner)
    {
        return view('admin.main_banners.edit', compact('mainBanner'));
    }

    public function update(Request $request, MainBanner $mainBanner)
    {
        $request->validate([
            'media_path' => 'nullable|file',
            'media_type' => 'required|in:image,video',
            'flag' => 'nullable|boolean',
        ]);

        $data = $request->only(['media_type', 'flag']);

        if ($request->hasFile('media_path')) {
            $filePath = $request->file('media_path')->store('main_banners', 'public');
            $data['media_path'] = $filePath;
        }

        if ($request->has('flag')) {
            MainBanner::setActiveBanner($mainBanner->id);
        }

        $mainBanner->update($data);

        return redirect()->route('admin.main_banners.index')->with('success', __('lang.banner_updated_successfully'));
    }

    public function destroy(MainBanner $mainBanner)
    {
        // Ensure the correct path is used
        $filePath = public_path(basename($mainBanner->media_path));

        // Check if the file exists and delete it
        if (File::exists($filePath)) {
            dd('enter');
            File::delete($filePath);
        }
        dd('not enter');
        // Delete the banner from the database
        $mainBanner->delete();

        return redirect()->route('admin.main_banners.index')->with('success', __('lang.banner_deleted_successfully'));
    }
}

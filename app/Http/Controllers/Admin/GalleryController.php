<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the galleries.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created gallery in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'type' => 'required|in:photo,video',
        ]);

        // Create the gallery
        Gallery::create([
            'ar_title' => $request->input('ar_title'),
            'en_title' => $request->input('en_title'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.galleries.index')->with('success', __('lang.gallery_created_successfully'));
    }

    /**
     * Show the form for editing the specified gallery.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'type' => 'required|in:photo,video',
        ]);

        // Update the gallery
        $gallery->update([
            'ar_title' => $request->input('ar_title'),
            'en_title' => $request->input('en_title'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.galleries.index')->with('success', __('lang.gallery_updated_successfully'));
    }

    /**
     * Remove the specified gallery from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', __('lang.gallery_deleted_successfully'));
    }
}

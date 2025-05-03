<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the images for a specific gallery.
     */
    public function index(Gallery $gallery)
    {
        $images = $gallery->images;
        return view('admin.gallery_images.index', compact('gallery', 'images'));
    }

    /**
     * Show the form for creating a new image.
     */
    public function create(Gallery $gallery)
    {
        return view('admin.gallery_images.create', compact('gallery'));
    }

    /**
     * Store a newly created image in storage.
     */
    public function store(Request $request, Gallery $gallery)
    {
        $request->validate([
            'file' => 'required|file',
            'ar_subtitle' => 'nullable|string|max:255',
            'en_subtitle' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
        ]);

        $filePath = $request->file('file')->store('gallery_images', 'public');

        $image = $gallery->images()->create([
            'image_path' => $filePath,
            'ar_subtitle' => $request->input('ar_subtitle'),
            'en_subtitle' => $request->input('en_subtitle'),
        ]);

        if ($request->boolean('featured')) { // Use boolean casting to ensure it works
            $gallery->update(['featured_image_id' => $image->id]);
        }

        return redirect()->route('admin.gallery_images.index', $gallery->id)
            ->with('success', __('lang.image_added_successfully'));
    }


    /**
     * Show the form for editing the specified image.
     */
    public function edit(Gallery $gallery, GalleryImage $image)
    {
        return view('admin.gallery_images.edit', compact('gallery', 'image'));
    }

    /**
     * Update the specified image in storage.
     */
    public function update(Request $request, Gallery $gallery, GalleryImage $image)
    {
        $request->validate([
            'file' => 'nullable|file',
            'ar_subtitle' => 'nullable|string|max:255',
            'en_subtitle' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('gallery_images', 'public');
            $image->update(['image_path' => $filePath]);
        }

        $image->update([
            'ar_subtitle' => $request->input('ar_subtitle'),
            'en_subtitle' => $request->input('en_subtitle'),
        ]);

        if ($request->boolean('featured')) {
            $gallery->update(['featured_image_id' => $image->id]);
        } elseif (!$request->has('featured') && $gallery->featured_image_id == $image->id) {
            $gallery->update(['featured_image_id' => null]);
        }

        return redirect()->route('admin.gallery_images.index', $gallery->id)
            ->with('success', __('lang.image_updated_successfully'));
    }

    /**
     * Remove the specified image from storage.
     */
    public function destroy(Gallery $gallery, GalleryImage $image)
    {
        $image->delete();
        return redirect()->route('admin.gallery_images.index', $gallery->id)->with('success', __('lang.image_deleted_successfully'));
    }
}

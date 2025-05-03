<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the news items.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news item.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news item in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_subtitle' => 'required|string|max:255',
            'en_subtitle' => 'required|string|max:255',
            'ar_head' => 'required|string|max:255',
            'en_head' => 'required|string|max:255',
            'ar_content' => 'required|string',
            'en_content' => 'required|string',
            'image1_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'flag' => 'nullable|boolean',
        ]);

        // Handle image uploads
        $image1Path = $request->file('image1_path')->store('news_images', 'public');
        $image2Path = $request->file('image2_path')->store('news_images', 'public');

        if ($request->has('flag') && $request->flag == 1) {
            // Ensure only one news item has the flag
            News::where('flag', true)->update(['flag' => false]);
        }

        News::create(array_merge($request->all(), [
            'image1_path' => $image1Path,
            'image2_path' => $image2Path,
        ]));

        return redirect()->route('admin.news.index')->with('success', __('lang.news_created_successfully'));
    }

    /**
     * Show the form for editing the specified news item.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified news item in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_subtitle' => 'nullable|string|max:255',
            'en_subtitle' => 'nullable|string|max:255',
            'ar_head' => 'nullable|string|max:255',
            'en_head' => 'nullable|string|max:255',
            'ar_content' => 'required|string',
            'en_content' => 'required|string',
            'image1_path' => 'nullable|file|image',
            'image2_path' => 'nullable|file|image',
            'flag' => 'nullable|boolean',
        ]);

        $data = $request->all();

        // Handle image uploads
        if ($request->hasFile('image1_path')) {
            // Delete the old image if exists
            if ($news->image1_path && Storage::exists('public/' . $news->image1_path)) {
                Storage::delete('public/' . $news->image1_path);
            }
            $data['image1_path'] = $request->file('image1_path')->store('news_images', 'public');
        }

        if ($request->hasFile('image2_path')) {
            // Delete the old image if exists
            if ($news->image2_path && Storage::exists('public/' . $news->image2_path)) {
                Storage::delete('public/' . $news->image2_path);
            }
            $data['image2_path'] = $request->file('image2_path')->store('news_images', 'public');
        }

        if ($request->has('flag') && $request->flag == 1) {
            // Ensure only one news item has the flag
            News::where('flag', true)->update(['flag' => false]);
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', __('lang.news_updated_successfully'));
    }

    /**
     * Remove the specified news item from storage.
     */
    public function destroy(News $news)
    {
        // Delete the associated images
        if ($news->image1_path && Storage::exists('public/' . $news->image1_path)) {
            Storage::delete('public/' . $news->image1_path);
        }
        if ($news->image2_path && Storage::exists('public/' . $news->image2_path)) {
            Storage::delete('public/' . $news->image2_path);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', __('lang.news_deleted_successfully'));
    }
}

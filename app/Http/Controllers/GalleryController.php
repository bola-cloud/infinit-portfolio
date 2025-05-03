<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('type','photo')->with('images','featuredImage')->get();
        return view('front.image-gallery', compact('galleries'));
    }

    public function mediaDetails($id)
    {
        $images = GalleryImage::with('gallery')->where('gallery_id',$id)->get();
        return view('front.media-details', compact('images'));
    }

    public function videoGallery()
    {
        // Fetch only video-type galleries and their related images
        $videos = GalleryImage::whereHas('gallery', function ($query) {
            $query->where('type', 'video'); // Filter galleries by type 'video'
        })->get(['image_path', 'ar_subtitle', 'en_subtitle']); // Fetch only necessary fields from GalleryImage

        return view('front.video-gallery', compact('videos'));
    }


}

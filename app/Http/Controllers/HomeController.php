<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainBanner;
use App\Models\News;
use App\Models\Partner;
use App\Models\Scope;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $mainBanner = MainBanner::where('flag',true)->first();
        $news = News::where('flag',true)->first();
        $partners = Partner::all();
        $scopes = Scope::all();
        // Fetch the latest image from a gallery that has 'image' type
        $latestImage = GalleryImage::whereHas('gallery', function ($query) {
            $query->where('type', 'photo');
        })->latest()->first();

        // Fetch the latest video from a gallery that has 'video' type
        $latestVideo = GalleryImage::whereHas('gallery', function ($query) {
            $query->where('type', 'video');
        })->latest()->first();

        return view('front.home',[
            'mainBanner'=>$mainBanner,
            'news'=>$news,
            'partners'=>$partners,
            'scopes'=>$scopes,
            'latestImage'=>$latestImage,
            'latestVideo'=>$latestVideo,
        ]);
    }

    public function newsDetails($id)
    {
        $news = News::find($id);
        return view('front.news-details',[
            'news'=>$news,
        ]);
    }

    public function latestNews()
    {
        $news = News::all();
        return view('front.latest-news',[
            'news'=>$news,
        ]);
    }

    public function showScopeProjects($id) {
        $scope = Scope::findOrFail($id);
        $projects = $scope->projects ?? collect(); // Ensures an empty collection instead of null
        return view('front.projects', compact('scope', 'projects'));
    }

    public function allProjects()
    {
        $scopes = Scope::all();
        $projects = Project::all();

        return view('front.all-projects', compact('scopes', 'projects'));
    }
}

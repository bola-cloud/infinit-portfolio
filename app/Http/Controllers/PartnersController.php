<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerCategory;

class PartnersController extends Controller
{
    public function index()
    {
        $categories = PartnerCategory::with('partners')->get();
        return view('front.partners', compact('categories'));
    }
}

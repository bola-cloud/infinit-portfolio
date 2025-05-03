<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scope;

class AboutController extends Controller
{
    public function index()
    {
        $scopes = Scope::all();
        return view('front.about', compact('scopes'));
    }
}

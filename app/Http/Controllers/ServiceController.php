<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // Retrieve all services from the database
        $services = Service::all();

        // Return the services view with the data
        return view('front.services', compact('services'));
    }
}

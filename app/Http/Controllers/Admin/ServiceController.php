<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(9); // Paginate 9 services per page
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
        ]);

        Service::create($request->all());
        return redirect()->route('admin.services.index')->with('success', __('lang.success_service_created'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
        ]);

        $service->update($request->all());
        return redirect()->route('admin.services.index')->with('success', __('lang.success_service_updated'));
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', __('lang.success_service_deleted'));
    }
}

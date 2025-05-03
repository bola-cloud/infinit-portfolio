<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::with('categories')->get();
        // dd($partners);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        $categories = PartnerCategory::all(); // Fetch all categories
        return view('admin.partners.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:partner_categories,id',
            'image' => 'required|image|max:2048'
        ]);

        $imagePath = $request->file('image')->store('partners', 'public');

        Partner::create([
            'category_id' => $request->category_id,
            'image_path' => 'storage/' . $imagePath,
        ]);

        return redirect()->route('admin.partners.index')->with('success', __('lang.partner_added'));
    }

    public function edit(Partner $partner)
    {
        $categories = PartnerCategory::all();
        return view('admin.partners.edit', compact('partner', 'categories'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'category_id' => 'required|exists:partner_categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('partners', 'public');
            $partner->image_path = 'storage/' . $imagePath;
        }

        $partner->update([
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.partners.index')->with('success', __('lang.partner_updated'));
    }

    public function destroy(Partner $partner)
    {
        // Delete the image file from public/storage/partners/
        if (File::exists(public_path($partner->image_path))) {
            File::delete(public_path($partner->image_path));
        }

        // Delete partner record from database
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', __('lang.partner_deleted'));
    }
}

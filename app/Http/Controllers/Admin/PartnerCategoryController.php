<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerCategory;

class PartnerCategoryController extends Controller
{
    public function index()
    {
        $categories = PartnerCategory::all();
        return view('admin.partners.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
        ]);

        PartnerCategory::create($request->all());

        return redirect()->route('admin.partner_categories.index')->with('success', __('lang.category_added'));
    }

    public function update(Request $request, PartnerCategory $partnerCategory)
    {
        $request->validate([
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
        ]);

        $partnerCategory->update($request->all());

        return redirect()->route('admin.partner_categories.index')->with('success', __('lang.category_updated'));
    }

    public function destroy(PartnerCategory $partnerCategory)
    {
        $partnerCategory->delete();

        return redirect()->route('admin.partner_categories.index')->with('success', __('lang.category_deleted'));
    }
}


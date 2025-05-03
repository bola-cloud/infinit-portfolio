<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scope;

class ScopeAdminController extends Controller
{
    public function index()
    {
        $scopes = Scope::all();
        return view('admin.scopes.index', compact('scopes'));
    }

    public function create()
    {
        return view('admin.scopes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
            'icon' => 'required|string|max:255',
            'color' => 'required|in:primary,success,warning,danger,info,secondary,dark',
        ]);

        Scope::create($request->all());

        return redirect()->route('admin.scopes.index')->with('success', __('lang.scope_added'));
    }

    public function edit(Scope $scope)
    {
        return view('admin.scopes.edit', compact('scope'));
    }

    public function update(Request $request, Scope $scope)
    {
        $request->validate([
            'ar_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
            'icon' => 'required|string|max:255',
            'color' => 'required|in:primary,success,warning,danger,info,secondary,dark',
        ]);

        $scope->update($request->all());

        return redirect()->route('admin.scopes.index')->with('success', __('lang.scope_updated'));
    }

    public function destroy(Scope $scope)
    {
        $scope->delete();

        return redirect()->route('admin.scopes.index')->with('success', __('lang.scope_deleted'));
    }
}

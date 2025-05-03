<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Scope;
use Illuminate\Support\Facades\Storage;

class ProjectAdminController extends Controller
{
    public function show($id) {
        $scope = Scope::findOrFail($id);
        $projects = Project::where('scope_id', $id)->get();
        return view('admin.projects.index', compact('projects', 'scope'));
    }

    public function create($id) {
        $scope = Scope::findOrFail($id);
        return view('admin.projects.create', compact('scope'));
    }

    public function save(Request $request, $id) {
        $request->validate([
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
            'ar_description' => 'nullable|string',
            'en_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image') ? $request->file('image')->store('projects', 'public') : null;

        Project::create([
            'scope_id' => $id,
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'ar_description' => $request->ar_description,
            'en_description' => $request->en_description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.scopes.show', $id)->with('success', __('lang.project_added'));
    }

    public function edit(Project $project) {
        $scopes = Scope::all();
        return view('admin.projects.edit', compact('project', 'scopes'));
    }

    public function update(Request $request, Project $project) {
        $request->validate([
            'scope_id' => 'required|exists:scopes,id',
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
            'ar_description' => 'nullable|string',
            'en_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $project->image);
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }

        $project->update($request->except('image'));

        return redirect()->route('admin.scopes.show', $project->id)->with('success', __('lang.project_updated'));
    }

    public function destroy(Project $project) {
        Storage::delete('public/' . $project->image);
        $project->delete();

        return redirect()->route('admin.scopes.show', $project->id)->with('success', __('lang.project_deleted'));
    }
}

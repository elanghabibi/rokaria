<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;

        $projects = Project::when($search, function($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->where('status', 'approved')->paginate(10);

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|min:6|max:50',
            'description' => 'required|min:10|max:255',
            'image' => 'mimes:jpg,png,jpeg|required|max:4096|image',
        ]);

        $path = $request->file('image')->store('project', 'public');
        $validated['image'] = $path;
        $validated['status'] = 'pending';

        Auth::user()->projects()->create($validated);

        return redirect()->route('my-project')->with('success', 'Karya berhasil terkirim!, Mohon tunggu konfirmasi admin.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        if($project->status === 'pending' && Auth::user()->role !== 'admin' && Auth::user()->id !== $project->user->id) {
            return redirect()->route('my-project');
        };

        $projects = Project::where('status', 'approved')->latest()->get();

        return view('project.show', compact('project', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //

        if (Auth::user()->role !== 'admin' && $project->user->id !== Auth::user()->id) {
            return abort(403);
        };

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $validated = $request->validate([
            'title' => 'required|min:6|max:50',
            'description' => 'required|min:10|max:255',
            'image' => 'mimes:jpg,png,jpeg|max:4096|image',
        ]);

        if ($request->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);

            $path = $request->file('image')->store('project', 'public');
            $validated['image'] = $path;
        };
        if (!$request->title || !$request->description) return redirect()->route('my-project');
        
        $validated['status'] = 'pending';
        $project->update($validated);

        return redirect()->route('my-project')->with('success', 'Karya berhasil di edit, Mohon tunggu konfirmasi admin.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        if (Auth::user()->role !== 'admin' && $project->user->id !== Auth::user()->id) {
            return abort(403);
        };

        if (Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        };

        $project->delete();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.project.index')->with('success', 'Karya berhasil dihapus!');    
        }

        return redirect()->route('my-project')->with('success', 'Karya berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index(Request $request)
    {
        $status = $request->status;
        $search = $request->search;

        if ($status) {
            $projects = Project::where("status", $status)->latest()->paginate(10)->withQueryString();
        } elseif ($search) {
            $projects = Project::when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })->latest()->paginate(10)->withQueryString();
        } else {
            $projects = Project::latest()->paginate(10)->withQueryString();
        }

        return view('admin.project.index', compact('projects'));
    }

    public function verification()
    {
        $projects = Project::where('status', 'pending')->latest()->paginate()->withQueryString();

        return view('admin.project.verification', compact('projects'));
    }

    public function show(Project $project) {
        return view('admin.project.show', compact('project'));
    }

    public function approve(Project $project)
    {
        $project->update([
            'status' => Project::STATUS_APPROVED,
        ]);

        return back()->with('success', 'Karya disetujui!');
    }

    public function reject(Project $project)
    {
        $project->update([
            'status' => Project::STATUS_REJECTED,
        ]);

        return back()->with('error', 'Karya ditolak!');
    }
    
}

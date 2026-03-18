<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index() {
        $projects = Project::latest()->get();

        return view('admin.project.index', compact('projects'));
    }

    public function approve(Project $project) {
        $project->update([
            'status' => Project::STATUS_APPROVED,
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Karya berhasil disetujui!');
    }

    public function reject(Project $project) {
        $project->update([
            'status' => Project::STATUS_REJECTED,
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Karya berhasil ditolak!');
    }
}

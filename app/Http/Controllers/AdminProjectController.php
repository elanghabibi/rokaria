<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class AdminProjectController extends Controller
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

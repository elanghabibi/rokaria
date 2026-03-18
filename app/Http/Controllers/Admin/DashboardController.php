<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $countUser = User::count();
        $countCreator = User::where("role", "user")->count();
        $countProject = Project::count();

        $countProjectPending = Project::where("status", "pending")->count();
        $countProjectApproved = Project::where("status", "approved")->count();
        $countProjectRejected = Project::where("status", "rejected")->count();

        return view('admin.dashboard', compact('countUser', 'countCreator', 'countProject', 'countProjectPending', 'countProjectApproved', 'countProjectRejected'));
    }
}

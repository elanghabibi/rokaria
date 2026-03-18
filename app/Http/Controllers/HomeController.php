<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        //

        $total_user = User::where('role', 'user')->count();
        $projects = Project::where('status', 'approved')->latest()->take(10)->get();

        return view('home', compact('projects', 'total_user'));
    }
}

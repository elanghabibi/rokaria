<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //

        $total_user = User::where('role', 'user')->count();
        $projects = Project::where('status', 'approved')->latest()->get();

        return view('home', compact('projects', 'total_user'));
    }
}

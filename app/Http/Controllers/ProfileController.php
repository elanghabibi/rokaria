<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $projects = $user->projects()->where('status', 'approved')->get();

        return view('profile.index', compact('user', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        //
        $lowerUsername = strtolower($username);

        $user = User::where('username', $lowerUsername)->firstOrFail();
        $projects = $user->projects()->where('status', 'approved')->get();

        if($user->role === 'admin') {
            return abort(404);
        };

        return view('profile.index', compact('user', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $id_user = Auth::user()->id;
        $user = User::findOrFail($id_user);

        $validated = $request->validate([
            'username' => [
                'required',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'name' => 'required|max:50',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'bio' => 'max:255'
        ]);

        $user->update($validated);

        return redirect()->route('profile.index')->with('success', 'User berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

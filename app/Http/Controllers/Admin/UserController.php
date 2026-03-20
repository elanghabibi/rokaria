<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {

        $role = $request->role;
        $search = $request->search;

        if ($role) {
            $users = User::where("role", $role)->latest()->paginate(10)->withQueryString();
        } elseif ($search) {
            $users = User::when($search, function ($query, $search) {
                $query->where('username', 'like', '%' . $search . '%');
            })->latest()->paginate(10)->withQueryString();
        } else {
            $users = User::latest()->paginate(10)->withQueryString();
        }


        return view("admin.users.index", compact("users"));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:50',
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $validated['role'] = $request->role;
        User::create($validated);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dibuat!');
    }

    public function edit(User $user)
    {
        return view("admin.users.edit", compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'username' => 'required|max:50',
            'name' => 'required|max:50',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        if ($user->id !== Auth::user()->id) {
            $validated['role'] = $request->role;
        }

        $user->update($validated);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil di edit!');
    }

    public function destroy(User $user)
    {
        //
        if (Auth::user()->role !== 'admin') {
            return abort(403);
        }
        ;

        $user->delete();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus!');
        }

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus!');
    }
}

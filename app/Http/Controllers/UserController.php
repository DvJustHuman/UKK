<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
    $users = User::latest()->get()->reverse();

        return view('admin.users', compact('users'));
    }

 public function update(Request $request, $id)
{
    $request->validate([
        'name'  => 'required',
        'email' => 'required|email',
        'role'  => 'required|in:admin,user'
    ]);

    $user = User::findOrFail($id);

    // jangan sampai admin menurunkan dirinya sendiri
    if ($user->id == Auth::id() && $request->role != 'admin') {

        return back()->with(
            'error',
            'Tidak bisa menurunkan role diri sendiri'
        );
    }

    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
        'role'  => $request->role
    ]);

    return back()->with(
        'success',
        'User berhasil diupdate'
    );
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // TAMPILKAN SEMUA USER
    public function index()
    {
        $users = User::latest()->get()->reverse();

        return view('admin.users', compact('users'));
    }

    // UPDATE USER
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'role'  => 'required|in:admin,pengunjung'
        ]);

        $user = User::findOrFail($id);

        // Cegah admin menurunkan role dirinya sendiri
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

    // HAPUS USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Cegah hapus akun sendiri
        if ($user->id == Auth::id()) {

            return back()->with(
                'error',
                'Tidak bisa menghapus akun sendiri'
            );
        }

        $user->delete();

        return back()->with(
            'success',
            'User berhasil dihapus'
        );
    }
}
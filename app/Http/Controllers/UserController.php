<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // ambil semua user dari database
        $users = User::all();

        // kirim data ke view admin.blade.php
        return view('admin', compact('users'));
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Active';
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diaktifkan.');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Nonaktif';
        $user->save();

        return redirect()->back()->with('success', 'User berhasil dinonaktifkan.');
    }
}
